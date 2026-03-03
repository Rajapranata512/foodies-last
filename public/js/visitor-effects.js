(() => {
    const body = document.body;
    if (!body) {
        return;
    }

    const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    const coarsePointer = window.matchMedia("(pointer: coarse)").matches;

    const progressBar = document.getElementById("scrollProgress");
    const cursorAura = document.getElementById("cursorAura");
    const canvas = document.getElementById("fxCanvas");
    const transitionOverlay = document.getElementById("pageTransition");

    const pointer = {
        targetX: window.innerWidth * 0.5,
        targetY: window.innerHeight * 0.5,
        x: window.innerWidth * 0.5,
        y: window.innerHeight * 0.5,
    };

    const clamp = (value, min, max) => Math.max(min, Math.min(max, value));

    const markReady = () => {
        body.dataset.motion = "ready";
        body.classList.add("motion-ready");
        if (transitionOverlay) {
            transitionOverlay.classList.add("is-ready");
        }
    };

    requestAnimationFrame(markReady);

    const updateScrollProgress = () => {
        if (!progressBar) {
            return;
        }

        const maxScroll = document.documentElement.scrollHeight - window.innerHeight;
        const ratio = maxScroll > 0 ? window.scrollY / maxScroll : 0;
        progressBar.style.transform = `scaleX(${clamp(ratio, 0, 1)})`;
    };

    updateScrollProgress();
    window.addEventListener("scroll", updateScrollProgress, { passive: true });
    window.addEventListener("resize", updateScrollProgress);

    if (!coarsePointer) {
        window.addEventListener("pointermove", (event) => {
            pointer.targetX = event.clientX;
            pointer.targetY = event.clientY;
        });
    }

    const setupReveal = () => {
        const revealTargets = document.querySelectorAll(".reveal-up, .reveal-fade, .reveal-scale, [data-stagger]");
        if (!revealTargets.length || !("IntersectionObserver" in window)) {
            revealTargets.forEach((el) => el.classList.add("is-visible"));
            return;
        }

        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) {
                        return;
                    }

                    const node = entry.target;
                    node.classList.add("is-visible");

                    if (node.hasAttribute("data-stagger")) {
                        const step = Number(node.getAttribute("data-stagger")) || 0.08;
                        const items = node.querySelectorAll(".stagger-item");
                        items.forEach((item, index) => {
                            item.style.transitionDelay = `${index * step}s`;
                            item.classList.add("is-visible");
                        });
                    }

                    observer.unobserve(node);
                });
            },
            { threshold: 0.18, rootMargin: "0px 0px -8% 0px" }
        );

        revealTargets.forEach((el) => observer.observe(el));
    };

    const setupMagnetic = () => {
        const targets = document.querySelectorAll(".btn-modern, .nav-link, .page-pill, .entry-skip");
        targets.forEach((node) => {
            node.addEventListener("mousemove", (event) => {
                if (reduceMotion || coarsePointer) {
                    return;
                }

                const rect = node.getBoundingClientRect();
                const offsetX = ((event.clientX - rect.left) / rect.width - 0.5) * 12;
                const offsetY = ((event.clientY - rect.top) / rect.height - 0.5) * 9;
                node.style.transform = `translate(${offsetX.toFixed(2)}px, ${offsetY.toFixed(2)}px)`;
            });

            node.addEventListener("mouseleave", () => {
                node.style.transform = "";
            });
        });
    };

    const setupCardTilt = () => {
        const cards = document.querySelectorAll(".modern-card, .recipe-card, .testimonial-card, .content-surface");
        cards.forEach((card) => {
            card.classList.add("fx-tilt-card");

            if (!card.querySelector(".card-shine")) {
                const shine = document.createElement("span");
                shine.className = "card-shine";
                card.appendChild(shine);
            }

            card.addEventListener("mousemove", (event) => {
                if (reduceMotion || coarsePointer) {
                    return;
                }

                const rect = card.getBoundingClientRect();
                const localX = event.clientX - rect.left;
                const localY = event.clientY - rect.top;
                const x = localX / rect.width;
                const y = localY / rect.height;
                const tiltX = (0.5 - y) * 7.5;
                const tiltY = (x - 0.5) * 8.8;

                card.style.setProperty("--mx", `${(x * 100).toFixed(2)}%`);
                card.style.setProperty("--my", `${(y * 100).toFixed(2)}%`);
                card.style.transform = `perspective(960px) rotateX(${tiltX.toFixed(2)}deg) rotateY(${tiltY.toFixed(2)}deg) translateY(-4px)`;
            });

            card.addEventListener("mouseleave", () => {
                card.style.transform = "";
            });
        });
    };

    const setupPageTransition = () => {
        if (!transitionOverlay || reduceMotion) {
            return;
        }

        const goWithTransition = (url) => {
            if (!url || transitionOverlay.classList.contains("is-active")) {
                return;
            }

            transitionOverlay.classList.add("is-active");
            window.setTimeout(() => {
                window.location.href = url;
            }, 360);
        };

        document.addEventListener("click", (event) => {
            const anchor = event.target.closest("a");
            if (!anchor) {
                return;
            }

            if (
                anchor.target === "_blank" ||
                anchor.hasAttribute("download") ||
                anchor.getAttribute("href")?.startsWith("#")
            ) {
                return;
            }

            const destination = anchor.href;
            if (!destination) {
                return;
            }

            const current = new URL(window.location.href);
            const next = new URL(destination, window.location.href);

            if (current.origin !== next.origin || current.href === next.href) {
                return;
            }

            event.preventDefault();
            goWithTransition(destination);
        });
    };

    const setupParallax = () => {
        const nodes = Array.from(document.querySelectorAll("[data-parallax], .hero-section, .page-bg-orb"));
        if (!nodes.length) {
            return;
        }

        const update = () => {
            nodes.forEach((node) => {
                const depth = Number(node.getAttribute("data-parallax")) || 0.04;
                const rect = node.getBoundingClientRect();
                const centerY = rect.top + rect.height * 0.5;
                const scrollDelta = (window.innerHeight * 0.5 - centerY) * depth * 0.22;
                const pointerXDelta = ((pointer.x / window.innerWidth) - 0.5) * depth * 34;
                const pointerYDelta = ((pointer.y / window.innerHeight) - 0.5) * depth * 22;

                node.style.setProperty("--parallax-x", `${pointerXDelta.toFixed(2)}px`);
                node.style.setProperty("--parallax-y", `${(scrollDelta + pointerYDelta).toFixed(2)}px`);
            });
        };

        const onScroll = () => update();
        window.addEventListener("scroll", onScroll, { passive: true });
        window.addEventListener("resize", onScroll);
        update();
    };

    const setupCanvasFx = () => {
        if (!canvas || reduceMotion) {
            if (canvas) {
                canvas.remove();
            }
            return;
        }

        const ctx = canvas.getContext("2d");
        if (!ctx) {
            return;
        }

        let width = 0;
        let height = 0;
        let rafId = 0;

        const density = window.innerWidth > 1280 ? 72 : window.innerWidth > 900 ? 48 : 28;
        const particles = Array.from({ length: density }, () => ({
            x: Math.random(),
            y: Math.random(),
            vx: (Math.random() - 0.5) * 0.00045,
            vy: (Math.random() - 0.5) * 0.00045,
            size: Math.random() * 2 + 0.6,
            alpha: Math.random() * 0.4 + 0.12,
            warm: Math.random() > 0.6,
        }));

        const resize = () => {
            width = window.innerWidth;
            height = window.innerHeight;
            canvas.width = width;
            canvas.height = height;
        };

        const draw = () => {
            ctx.clearRect(0, 0, width, height);

            particles.forEach((p) => {
                p.x += p.vx + ((pointer.x / width) - 0.5) * 0.00003;
                p.y += p.vy + ((pointer.y / height) - 0.5) * 0.00003;

                if (p.x < -0.03) p.x = 1.03;
                if (p.x > 1.03) p.x = -0.03;
                if (p.y < -0.03) p.y = 1.03;
                if (p.y > 1.03) p.y = -0.03;

                const px = p.x * width;
                const py = p.y * height;
                const color = p.warm
                    ? `rgba(251, 191, 36, ${p.alpha})`
                    : `rgba(147, 197, 253, ${p.alpha})`;

                ctx.beginPath();
                ctx.fillStyle = color;
                ctx.arc(px, py, p.size, 0, Math.PI * 2);
                ctx.fill();
            });

            rafId = requestAnimationFrame(draw);
        };

        resize();
        draw();
        window.addEventListener("resize", resize);
        document.addEventListener("visibilitychange", () => {
            if (document.hidden) {
                cancelAnimationFrame(rafId);
            } else {
                draw();
            }
        });
    };

    const animateLoop = () => {
        pointer.x += (pointer.targetX - pointer.x) * 0.12;
        pointer.y += (pointer.targetY - pointer.y) * 0.12;

        body.style.setProperty("--pointer-x", `${pointer.x.toFixed(2)}px`);
        body.style.setProperty("--pointer-y", `${pointer.y.toFixed(2)}px`);
        body.style.setProperty("--pointer-ratio-x", `${(pointer.x / window.innerWidth).toFixed(4)}`);
        body.style.setProperty("--pointer-ratio-y", `${(pointer.y / window.innerHeight).toFixed(4)}`);

        if (cursorAura && !coarsePointer && !reduceMotion) {
            cursorAura.style.transform = `translate(${(pointer.x - 24).toFixed(2)}px, ${(pointer.y - 24).toFixed(2)}px)`;
        } else if (cursorAura) {
            cursorAura.remove();
        }

        requestAnimationFrame(animateLoop);
    };

    setupReveal();
    setupMagnetic();
    setupCardTilt();
    setupPageTransition();
    setupParallax();
    setupCanvasFx();
    animateLoop();
})();
