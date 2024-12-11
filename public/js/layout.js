
    document.getElementById('step_number').addEventListener('input', function() {
        const stepContainer = document.getElementById('step-fields');
        stepContainer.innerHTML = '';
        const stepCount = this.value;
        for (let i = 1; i <= stepCount; i++) {
            const input = `<div class="mb-3">
                <label for="step_${i}" class="form-label">Step ${i}</label>
                <textarea class="form-control" id="step_${i}" name="steps[]" placeholder="Deskripsi langkah ${i}" required></textarea>
            </div>`;
            stepContainer.innerHTML += input;
        }
    });

    document.getElementById('equipment_number').addEventListener('input', function() {
        const equipmentContainer = document.getElementById('equipment-fields');
        equipmentContainer.innerHTML = '';
        const equipmentCount = this.value;
        for (let i = 1; i <= equipmentCount; i++) {
            const input = `<div class="mb-3">
                <label for="equipment_${i}" class="form-label">Equipment ${i}</label>
                <input type="text" class="form-control" id="equipment_${i}" name="equipments[]" placeholder="Nama equipment ${i}" required>
            </div>`;
            equipmentContainer.innerHTML += input;
        }
    });

    document.getElementById('ingredient_number').addEventListener('input', function() {
        const ingredientContainer = document.getElementById('ingredient-fields');
        ingredientContainer.innerHTML = '';
        const ingredientCount = this.value;
        for (let i = 1; i <= ingredientCount; i++) {
            const input = `<div class="mb-3">
                <label for="ingredient_${i}" class="form-label">Ingredient ${i}</label>
                <input type="text" class="form-control" id="ingredient_${i}" name="ingredients[]" placeholder="Nama ingredient ${i}" required>
            </div>`;
            ingredientContainer.innerHTML += input;
        }
    });

