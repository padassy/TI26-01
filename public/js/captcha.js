			function captchaCF2M(callback, captchaLen) {
				function randomInt(min, max) {
					return Math.floor(Math.random() * (max - min + 1) + min)
				}
				
				// Retourne un array contenant autant d'élements venant de "array" que "numberOfElements"
				function getElementsFromArray(array, numberOfElements) {
					let arrayOfElements = [];
					for (let i = 0; i < numberOfElements; i++) {
						let randomElement = array[randomInt(0, array.length - 1)];
						arrayOfElements.push(randomElement);
					}
					return arrayOfElements
				}
				
				// Vide le contenu de l'élément avec l'id "captcha" et y insère un nouveau captcha
				function generateCaptcha() {
					captcha.innerHTML = "";
					captchaInput.value = ""; 

					let captchaArray = getElementsFromArray(allCharacters, captchaLen);
					for (let i = 0; i < captchaArray.length; i++) {
						let colors = randomRGB(); //
						let size = randomSize();
						captcha.insertAdjacentHTML('beforeend', `<span style="color: rgb(${colors[0]}, ${colors[1]}, ${colors[2]}); font-size: ${size}em">${captchaArray[i]}</span>`);
					}
				}

				// Vérifie si l'entrée utilisateur correspond au captcha et appelle le callback sinon génère un nouveau captcha
				function validateCaptcha() {
					if (captcha.textContent === captchaInput.value) {
						captchaInput.classList.remove("invalidCaptcha");
						captchaInput.classList.add("validCaptcha");
						callback();
						return true;
					} else {
						captchaInput.classList.add("invalidCaptcha");
						generateCaptcha(captchaLen);
						return false
					}
				}

				function randomRGB() {
					let arrayRGB = [];

					for (let i = 0; i < 3; i++) {
						arrayRGB.push(randomInt(25, 250));
					}
					// randomInt(min, max)
					return arrayRGB
				}

				// Génère un nombre décimal afin d'être utilisé en tant que valeur de em
				function randomSize() {
					return randomInt(15, 18) / 10
				}
			
				const allCharacters = ['A', 'B', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'U', 'Y', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
				const captcha = document.querySelector('#captcha');
				const captchaInput = document.querySelector('#captchaInput');
				const captchaValidate = document.querySelector('#captchaValidate');
				const captchaRefresh = document.querySelector('#captchaRefresh');
				

				generateCaptcha(captchaLen);
				captchaInput.addEventListener('change', validateCaptcha);
				captchaRefresh.addEventListener('click', generateCaptcha);
				captchaValidate.addEventListener('click',validateCaptcha);
			}
				

			function redirectionDuckduck() {
				document.querySelector("#formulaire").requestSubmit(); // Envoyer un formulaire
			}
		
				// Comment lié le captcha en JS avec le php qui gere le CF ????
				// Le verifie avec JS ou PHP ???
				// Comment traiter la validation si valider avec JS?
				
			
			captchaCF2M(redirectionDuckduck, 7)


			let textarea = document.querySelector('#textarea');
			let div = document.querySelector ("#divCompteur")
			
			div.insertAdjacentHTML("afterend","<span id='caractereMax'> Caractères maximum </span>");
			div.insertAdjacentHTML("afterend","<span id='maxCounter'></span>");
			div.insertAdjacentHTML("afterend","<span id='slash'>/</span>");
			document.querySelector('#maxCounter').innerHTML = textarea.maxLength ;
			div.insertAdjacentHTML("afterend","<span id='counterLetters'>0 </span>");

			let counter = document.querySelector('#counterLetters');
			textarea.addEventListener('input', () => counter.textContent = textarea.value.length);