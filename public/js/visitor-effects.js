(() => {
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const coarsePointer = window.matchMedia('(pointer: coarse)').matches;

    const progressBar = document.getElementById('scrollProgress');
    const cursorAura = document.getElementById('cursorAura');
    const canvas = document.getElementById('fxCanvas');

    const pointer = {
        x: window.innerWidth * 0.5,
        y: window.innerHeight * 0.5,
    };

    const aura = {
        x: pointer.x,
        y: pointer.y,
    };

    const updateScrollProgress = () => {
        if (!progressBar) {
            return;
        }

        const maxScroll = document.documentElement.scrollHeight - window.innerHeight;
        const ratio = maxScroll > 0 ? (window.scrollY / maxScroll) : 0;
        progressBar.style.transform = `scaleX(${Math.max(0, Math.min(1, ratio))})`;
    };

    updateScrollProgress();
    window.addEventListener('scroll', updateScrollProgress, { passive: true });
    window.addEventListener('resize', updateScrollProgress);

    if (!coarsePointer) {
        window.addEventListener('pointermove', (event) => {
            pointer.x = event.clientX;
            pointer.y = event.clientY;
            document.body.style.setProperty('--pointer-x', `${pointer.x}px`);
            document.body.style.setProperty('--pointer-y', `${pointer.y}px`);
        });
    }

    if (cursorAura && !coarsePointer) {
        const moveAura = () => {
            aura.x += (pointer.x - aura.x) * 0.15;
            aura.y += (pointer.y - aura.y) * 0.15;
            cursorAura.style.transform = `translate(${aura.x - 24}px, ${aura.y - 24}px)`;
            requestAnimationFrame(moveAura);
        };

        moveAura();
    } else if (cursorAura) {
        cursorAura.remove();
    }

    const setupMagnetic = () => {
        const targets = document.querySelectorAll('.btn-modern, .nav-link, .page-pill');

        targets.forEach((node) => {
            node.addEventListener('mousemove', (event) => {
                if (reduceMotion || coarsePointer) {
                    return;
                }

                const rect = node.getBoundingClientRect();
                const offsetX = ((event.clientX - rect.left) / rect.width - 0.5) * 10;
                const offsetY = ((event.clientY - rect.top) / rect.height - 0.5) * 10;
                node.style.transform = `translate(${offsetX}px, ${offsetY}px)`;
            });

            node.addEventListener('mouseleave', () => {
                node.style.transform = '';
            });
        });
    };

    const setupCardTilt = () => {
        const cards = document.querySelectorAll('.modern-card, .recipe-card, .testimonial-card');

        cards.forEach((card) => {
            card.classList.add('fx-tilt-card');

            card.addEventListener('mousemove', (event) => {
                if (reduceMotion || coarsePointer) {
                    return;
                }

                const rect = card.getBoundingClientRect();
                const x = (event.clientX - rect.left) / rect.width;
                const y = (event.clientY - rect.top) / rect.height;
                const tiltX = (0.5 - y) * 6;
                const tiltY = (x - 0.5) * 8;

                card.style.transform = `perspective(900px) rotateX(${tiltX}deg) rotateY(${tiltY}deg) translateY(-3px)`;
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = '';
            });
        });
    };

    if (canvas && !reduceMotion) {
        const ctx = canvas.getContext('2d');
        let width = window.innerWidth;
        let height = window.innerHeight;
        let rafId = 0;
        const density = width > 1200 ? 54 : width > 768 ? 36 : 22;
        const particles = [];

        const resizeCanvas = () => {
            width = window.innerWidth;
            height = window.innerHeight;
            canvas.width = width;
            canvas.height = height;
        };

        const createParticle = () => ({
            x: Math.random() * width,
            y: Math.random() * height,
            vx: (Math.random() - 0.5) * 0.45,
            vy: (Math.random() - 0.5) * 0.45,
            size: Math.random() * 1.9 + 0.6,
            alpha: Math.random() * 0.4 + 0.18,
        });

        resizeCanvas();
        for (let i = 0; i < density; i += 1) {
            particles.push(createParticle());
        }

        const draw = () => {
            ctx.clearRect(0, 0, width, height);

            particles.forEach((dot) => {
                dot.x += dot.vx + (pointer.x - width * 0.5) * 0.00002;
                dot.y += dot.vy + (pointer.y - height * 0.5) * 0.00002;

                if (dot.x < -10) dot.x = width + 10;
                if (dot.x > width + 10) dot.x = -10;
                if (dot.y < -10) dot.y = height + 10;
                if (dot.y > height + 10) dot.y = -10;

                ctx.beginPath();
                ctx.fillStyle = `rgba(255, 255, 255, ${dot.alpha})`;
                ctx.arc(dot.x, dot.y, dot.size, 0, Math.PI * 2);
                ctx.fill();
            });

            rafId = requestAnimationFrame(draw);
        };

        draw();

        window.addEventListener('resize', resizeCanvas);
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                cancelAnimationFrame(rafId);
            } else {
                draw();
            }
        });
    } else if (canvas) {
        canvas.remove();
    }

    setupMagnetic();
    setupCardTilt();
})();
