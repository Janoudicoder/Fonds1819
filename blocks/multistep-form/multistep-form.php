<section class="multiestep-form relative z-10 pb-24 flex justify-center items-center mb-[-125px]">
    <div class="form-container bg-primary shadow-md p-6 flex flex-col justify-center items-center">
        <div id="step1" class="step">
            <h2 class="text-xl font-bold mb-4 text-center text-white">Stap 1 van 5</h2>
            <p class="mb-4 text-white text-center-custom w-2/3 mx-auto" style="font-family: 'Source Sans Pro', sans-serif;">
                Is jouw organisatie gevestigd in onze regio en richt je je met het project op inwoners van deze gemeenten?
            </p>
            <div class="confirmation-bg p-4 rounded-lg">
                <p class="text-white mb-4 text-center-custom" style="font-family: 'Source Sans Pro', sans-serif;">
                    Onze regio bestaat uit de gemeenten:
                    <br> • Borculo
                    <br> • Goor
                    <br> • Lochem
                    <br> • Ruurlo
                </p>
            </div>
            <div class="flex justify-between">
                <button class="btn btn-slider" onclick="changeStep(1)">Ja</button>
                <button class="btn btn-slider" onclick="changeStep(-1, false)">Nee</button>
            </div>
        </div>

        <div id="step2" class="step hidden">
            <h2 class="text-xl font-bold mb-4 text-center text-white">Stap 2: Adres</h2>
            <p class="mb-4 text-white text-center-custom w-2/3 mx-auto" style="font-family: 'Source Sans Pro', sans-serif;">Vul je adres in:</p>
            <div class="confirmation-bg p-4 rounded-lg">
                <p class="text-white text-center-custom" style="font-family: 'Source Sans Pro', sans-serif;">Jouw adres: [Adres hier]</p>
                <div class="flex justify-between mt-4 space-x-4">
                    <button class="bg-white text-black w-1/2 h-12 rounded-md hover:bg-gray-200 transition-colors" onclick="changeStep(1)">Ja, verder</button>
                    <button class="bg-white text-black w-1/2 h-12 rounded-md hover:bg-gray-200 transition-colors" onclick="changeStep(-1, false)">Nee, terug</button>
                </div>
            </div>
        </div>

        <div id="step5" class="step hidden">
            <h2 class="text-xl font-bold mb-4 text-center text-white">Stap 5: Bedankt</h2>
            <div class="confirmation-bg p-4 rounded-lg">
                <p class="text-white text-center-custom" style="font-family: 'Source Sans Pro', sans-serif;">Bedankt voor het invullen van het formulier!</p>
            </div>
        </div>
    </div>

    <script>
        let currentStep = 0;

        function changeStep(n, proceed = true) {
            if (!proceed) {
                showAlert("Je kan niet verder!", "bg-primary text-white p-3 rounded-lg mt-4 text-center-custom absolute bottom-0 left-1/2 transform -translate-x-1/2 h-12 w-1/2");
                return;
            }

            const steps = document.querySelectorAll('.step');
            steps[currentStep].classList.add('hidden');
            currentStep += n;

            if (currentStep >= steps.length) {
                currentStep = steps.length - 1;
            } else if (currentStep < 0) {
                currentStep = 0;
            }

            steps[currentStep].classList.remove('hidden');
        }

        function showAlert(message, classes) {
            const formContainer = document.querySelector(".form-container");
            const alertDiv = document.createElement("div");
            alertDiv.className = classes;
            alertDiv.textContent = message;

            formContainer.appendChild(alertDiv);

            // Remove alert after 3 seconds
            setTimeout(() => alertDiv.remove(), 3000);
        }
    </script>
</section>