        const qtyInput = document.getElementById("qty");
        const priceInput = document.getElementById("price");
        const bmiOutput = document.getElementById("subtotal");
        const vatOutput = document.getElementById("vat");
        const totalOutput = document.getElementById("total");

        function calculateBMI() {
            const weight = qtyInput.value;
            const height =priceInput.value;
            if (weight && height) {
                const bmi = weight * height;
                const vat = (bmi/ 100) * 12;
                const total = vat + bmi + 50;

                bmiOutput.textContent = "₱" + bmi.toFixed(2);
                vatOutput.textContent = "₱" + vat.toFixed(2);
                totalOutput.textContent = "₱" + total.toFixed(2);
            } else {
                bmiOutput.textContent = "";
                 vatOutput.textContent = "";
                totalOutput.textContent = "";
            }
        }

        qtyInput.addEventListener("input", calculateBMI);
        heightInput.addEventListener("input", calculateBMI);