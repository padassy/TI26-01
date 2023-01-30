<!DOCTYPE html>
<html>
<head>
<title>Compteur de caractères HTML Javascript</title>
<style>
label {
  position: relative;
}

input {
  font-size: 1.4rem;
  padding: .8rem 2rem .8rem 0;
  background: transparent;
  color: #F5F8FF;
  border-bottom: 1.5px solid rgba(245, 248, 255, .4);
  transition: all .4s;
  outline: none;
}
input:focus {
  border-color: #FF4754;
}

input::placeholder {
  color: red;
}
label span {
  position: absolute;
  right: 0;
  top: 50%;

  transform: translateY(-50%);
  width: 1.6rem;
  height: 1.6rem;

  display: flex;
  align-items: center;
  justify-content: center;

  font-size: .8rem;
  color: #F5F8FF;
  background: white;
  border-radius: 5px;
}
</style>
</head>
    <body>
        <input type="text" maxlength="20"><br>
        <textarea type="text" maxlength="20"></textarea>
        <script>
            textareas = document.querySelectorAll("textarea");
            inputs = document.querySelectorAll("input");

            function displayCounter () {
                let target = event.currentTarget;
                if (target.hasAttribute("maxlength")) { 
                    let maxLength = target.getAttribute("maxlength");
                    let currentLength = target.value.length;
                    
                    if(document.getElementById("compteur") != null){
                        document.getElementById("compteur").remove();
                    }
                    
                    let div = document.createElement("div");
                    div.setAttribute("id", "compteur");
                    div.setAttribute("style", "color:#ff9074;font-size:11px;"); 
                    target.after(div);
                    if (parseInt(maxLength - currentLength) < 15) {
                        document.getElementById('compteur').innerHTML = "\rReste " + parseInt(maxLength - currentLength) + " caractères";
                    }
                    setTimeout(function(){
                        if(document.getElementById("compteur") != null){
                            document.getElementById("compteur").remove();
                        }
                    }, 1500);
                }
            }

            for (let i = 0; i < textareas.length; i++) {
                textareas[i].addEventListener("input", function() {
                    displayCounter();
                });
            }

            for (let i = 0; i < inputs.length; i++) {
                inputs[i].addEventListener("input", function() {
                    displayCounter();
                });
            }

            const input = document.querySelector('input');
const counter = document.querySelector('label span');
const maxLength = input.getAttribute('maxlength');

input.addEventListener('input', event => {
  const valueLength = event.target.value.length;
  const leftCharLength = maxLength - valueLength;

  if (leftCharLength < 0) return;
  counter.innerText = leftCharLength;
});
        </script>
        <label>
        <input type="text" placeholder="Titre" maxlength=20>
        <span></span>
        </label>
    </body>
</html>