// ARRAYS
const voicelines = [
    {
        audio: "voicelines/voiceline0.mp3",
        text: "Você é uma estrela celestial!",
        spriteIdle: "sprites/confidentA.gif",
        spriteTalking: "sprites/confidentB.gif",
        duration: 3
    },
    {
        audio: "voicelines/voiceline1.mp3",
        text: "Você é um show!",
        spriteIdle: "sprites/confidentA.gif",
        spriteTalking: "sprites/confidentB.gif",
        duration: 2
    },
    {
        audio: "voicelines/voiceline2.mp3",
        text: "Você é demais!",
        spriteIdle: "sprites/confidentA.gif",
        spriteTalking: "sprites/confidentB.gif",
        duration: 2
    },
    {
        audio: "voicelines/voiceline3.mp3",
        text: "É... Você tentou, neh. O que vale as vezes é a intenção.",
        spriteIdle: "sprites/embarrassedA.gif",
        spriteTalking: "sprites/embarrassedB.gif",
        duration: 7
    },
    {
        audio: "voicelines/voiceline4.mp3",
        text: "É. Você deve ser uma decepção para sua família inteira, né, mano. Que medíocre.",
        spriteIdle: "sprites/sweatingA.gif",
        spriteTalking: "sprites/sweatingB.gif",
        duration: 7
    },
] // array de objetos: falas e sprites

// VARIAVEIS
let contABtn = 0;

// FUNÇÃO PARA CRIAR CARREGAMENTO
function loadingF(txt) {
    let txtC = txt;

    setInterval(function () {
        if (txtC == txt + "....") {
            txtC = txt;
        } else {
            quiz.innerHTML = `
            <h1> ${txtC} </h1>
        `
            txtC += ".";
        }
    }, 200);
}

// FUNÇÃO PARA RESETAR O QUIZ
function resetQuiz() {
    loadingF("Resetando");

    pbBlockElement.style.transition = "10s";
    pbBlockElement.style.height = "0px";

    const abElements = document.querySelectorAll(".answers");
    let index = 0;

    setInterval(function () {
        if (index < abElements.length) {
            abElements[index].style.opacity = "0";
            index++;
        }
    }, 540);

    setTimeout(function () {
        location.reload(); // recarrega a página
    }, 9000); // timeout de 2s para recarregar a página
}

// FUNÇÃO DE ALTERAR A COR DE ACORDO COM O ACERTO
function colorChange() {
    const elements = document.querySelectorAll(".mark");

    for (let i = 0; i < elements.length; i++) {
        if (elements[i].textContent === "✔") {
            elements[i].classList.add("rightAnswer");
        } else {
            elements[i].classList.add("wrongAnswer");
        }
    }
}
// FUNÇÃO DE REVELAR RESPOSTAS
function showAnswers(button) {
    if(contABtn === 0){
        answersBarElement.style.opacity = "1";
        button.innerHTML = "Ocultar Respostas";
        contABtn++;
    } else {
        answersBarElement.style.opacity = "0";
        button.innerHTML = "Revelar Respostas";
        contABtn--;
    }
}

// FUNÇÃO DE EXIBIR RESULTADO
function showResult() {

    let index = 0;
    let delay = 0;

    if(score === shittyAiQuiz.length){
        index = 0;
    } else if(score  >= (shittyAiQuiz.length * (3 / 4))){
        index = 1;
    } else if(score >= (shittyAiQuiz.length * (1 / 2))){
        delay = 400;
        index = 2;
    } else if(score >= (shittyAiQuiz.length * (1 / 4))){
        index = 3;
    } else {
        index = 4;
    }

    quiz.innerHTML = `
    <img id="cabral" src="${voicelines[index].spriteIdle}">
    <audio id="voiceline" autoplay>
        <source src="${voicelines[index].audio}" type="audio/mpeg">
    </audio>
    <div id="finalMessage">${voicelines[index].text}</div>
    <div id="finalScore">Parábens, você acertou <span id="score">${score}</span> de <span id="maxScore">${shittyAiQuiz.length}</span>!</div>
    <div id="options" class="container">
        <button id="revealBtn" onclick="colorChange(); showAnswers(this);">Revelar Respostas</button>
        <button id="resetBtn" onclick="resetQuiz()">Resetar</button>
    </div>
  `;

  setTimeout(function(){
    const sprite = document.getElementById("cabral");

    sprite.src = voicelines[index].spriteTalking;
    setTimeout(function(){
        const sprite = document.getElementById("cabral");

        sprite.src = voicelines[index].spriteIdle;
        }, (voicelines[index].duration * 1000));
        
    }, delay);
}