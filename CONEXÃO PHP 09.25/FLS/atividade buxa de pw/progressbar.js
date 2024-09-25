// ARRAYS
const progressBarBlocksColor = [
    "linear-gradient(to bottom, rgb(185, 111, 255), rgb(165, 98, 226))",
    "linear-gradient(to bottom, rgb(185, 111, 255), rgb(146, 85, 198))",
    "linear-gradient(to bottom, rgb(185, 111, 255), rgb(127, 72, 170))",
    "linear-gradient(to bottom, rgb(185, 111, 255), rgb(108, 59, 142))",
    "linear-gradient(to bottom, rgb(185, 111, 255), rgb(89, 46, 114))",
    "linear-gradient(to bottom, rgb(185, 111, 255), rgb(70, 33, 86))",
    "linear-gradient(to bottom, rgb(185, 111, 255), rgb(51, 20, 58))",
    "linear-gradient(to bottom, rgb(185, 111, 255), rgb(32, 7, 30))",
    "linear-gradient(to bottom, rgb(185, 111, 255), rgb(13, 0, 2))",
    "linear-gradient(to bottom, rgb(185, 111, 255), rgb(13, 0, 2))"
] // array de cores para a barra de progressão

// VARIAVEIS
const progressBarElement = document.getElementById("progressBar"); // elemento barra de progressão
const pbBlockElement = document.getElementById("progressBarBlock"); // elemento de bloco da barra de progressão
const answersBarElement = document.getElementById("answersBar"); // elemento barra de respostas

let pbColorIndex = 0;

// FUNÇÃO DE PROGRESSÃO
function progressBar() {
    pbBlockElement.style.backgroundImage = progressBarBlocksColor[pbColorIndex];
    pbColorIndex++;
    pbBlockElement.style.height = pbColorIndex * 10+"%";
}

// FUNÇÃO ADICIONA ELEMENTO DE RESPOSTA AO DOCUMENTO HTML
function answersBar(right) {
    const mark = document.createElement("div");
    function markH() {
        if (right === true) {
            return "&#10004;"
        } else {
            return "&#10006;";
        }
    };

    

    mark.classList.add("answers");
    mark.classList.add("container");

    mark.innerHTML = `
        <span class="mark">${markH()}</span>
        <span class="showAnswer">
            <p class="qT">
            ${(pbColorIndex + 1)}. ${shittyAiQuiz[questionIndex].question}
            </p>
            <p class="aT">
            R: ${shittyAiQuiz[questionIndex].answer}
            </p>
        </span>
    `;
    answersBarElement.appendChild(mark);
}