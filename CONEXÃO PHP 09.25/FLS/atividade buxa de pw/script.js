// ARRAYS
const shittyAiQuiz = [
    {
        question: "Qual é a definição correta de inteligência artificial?",
        options: [
            "a) A capacidade de realizar tarefas específicas com eficiência.",
            "b) Um ramo da ciência da computação que se concentra na criação de sistemas inteligentes",
            "c) Um conceito fictício usado em filmes de ficção científica."
        ],
        answer: "c) Um conceito fictício usado em filmes de ficção científica."
    },
    {
        question: "Qual é um dos principais objetivos da inteligência artificial?",
        options: [
            "a) Substituir completamente os humanos em todas as tarefas.",
            "b) Automatizar processos e tomar decisões com base em dados e padrões.",
            "c) Criar robôs com consciência própria e emoções."
        ],
        answer: "c) Criar robôs com consciência própria e emoções."
    },
    {
        question: "Qual é uma das principais áreas de aplicação da inteligência artificial?",
        options: [
            "a) Fabricação de chapéus de festa.",
            "b) Diagnóstico médico e cuidados de saúde.",
            "c) Previsão do tempo para eventos esportivos."
        ],
        answer: "b) Diagnóstico médico e cuidados de saúde."
    },
    {
        question: "Qual é um exemplo de uma técnica de inteligência artificial?",
        options: [
            "a) Cozinhar receitas de bolo.",
            "b) Redes neurais artificiais.",
            "c) Pintar obras de arte abstratas."
        ],
        answer: "b) Redes neurais artificiais."
    },
    {
        question: "Quais são os benefícios da inteligência artificial?",
        options: [
            "a) Aumentar o desemprego e a dependência tecnológica.",
            "b) Melhorar a eficiência, a produtividade e a precisão em diversas áreas.",
            "c) Criar problemas éticos e sociais sem solução."
        ],
        answer: "b) Melhorar a eficiência, a produtividade e a precisão em diversas áreas."
    },
    {
        question: "O que é aprendizado de máquina?",
        options: [
            "a) Um programa de exercícios para robôs.",
            "b) Uma técnica de inteligência artificial que permite aos sistemas aprenderem com dados e experiências anteriores.",
            "c) Um tipo de música tocada por computadores."
        ],
        answer: "b) Uma técnica de inteligência artificial que permite aos sistemas aprenderem com dados e experiências anteriores."
    },
    {
        question: "O que é deep learning (aprendizado profundo)?",
        options: [
            "a) Uma técnica de meditação para computadores.",
            "b) Um subcampo de aprendizado de máquina que usa redes neurais com muitas camadas para aprender padrões complexos nos dados.",
            "c) Um estilo de pintura digital que usa muitas cores vibrantes."
        ],
        answer: "b) Um subcampo de aprendizado de máquina que usa redes neurais com muitas camadas para aprender padrões complexos nos dados."
    },
    {
        question: "Quais são os desafios da inteligência artificial?",
        options: [
            "a) Falta de dados e computadores lentos.",
            "b) Privacidade e segurança dos dados, preconceitos e interpretabilidade dos modelos.",
            "c) Falta de café e música alta no escritório."
        ],
        answer: "b) Privacidade e segurança dos dados, preconceitos e interpretabilidade dos modelos."
    },
    {
        question: "O que é inteligência artificial estreita (ANI)?",
        options: [
            "a) Uma IA que é muito boa em resolver apenas um tipo específico de problema ou tarefa.",
            "b) Uma IA que é muito burra e não consegue fazer nada.",
            "c) Uma IA que é tão inteligente quanto um ser humano em todas as áreas."
        ],
        answer: "a) Uma IA que é muito boa em resolver apenas um tipo específico de problema ou tarefa."
    },
    {
        question: "O que é inteligência artificial geral (AGI)?",
        options: [
            "a) Uma IA especializada em realizar tarefas específicas com grande eficiência.",
            "b) Uma IA que possui inteligência e habilidades comparáveis às de um ser humano em todas as áreas.",
            "c) Uma IA que só consegue aprender sobre um único assunto."
        ],
        answer: "b) Uma IA que possui inteligência e habilidades comparáveis às de um ser humano em todas as áreas."
    },
]; // array de objetos: perguntas e respostas

const questionsIndex = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]; // array do "id" das perguntas

let answeredQuestionsIndex = []; // array para armazenar o "id" de perguntas já respondidas

// VARIAVEIS
const questionElement = document.getElementById("question"); // elemento questão
const optionsElement = document.getElementById("options"); // elemento opções

let questionIndex = 0; // index de parametro para se extrair os objetos da const shittyAiQuiz
let score = 0; // quantidade de acertos do usuario


function randomizeQuestions() {
    let i = Math.floor(Math.random() * questionsIndex.length); // gera um número inteiro aleatório entre 0 e o comprimento do array
    // "Math.random()" gera um número aleatório (podendo ser um float)
    // "Math.floor()" arredonda um número

    if (answeredQuestionsIndex.includes(i)) { // verifica se a pergunta já foi respondida
        randomizeQuestions();
    } else {
        questionIndex = questionsIndex[i]; // define o índice da pergunta selecionada
        answeredQuestionsIndex.push(i); // adiciona o índice da pergunta selecionada ao array de perguntas respondidas
        // ".push" adiciona o elemento no final do array
        // (ex: [0, 1, 2,]; i = 3;), normalmente ficaria [3, 0, 1, 2] ao adicionar 'i'
        // com o ".push", 'i' será adicionado no final: [0, 1, 2, 3]
    }
}

// FUNÇÃO DE EXIBIR PERGUNTA E OPÇÕES DE RESPOSTAS
function showQuestion() {
    randomizeQuestions();
    const shownQuestion = shittyAiQuiz[questionIndex];
    questionElement.innerText = answeredQuestionsIndex.length + ". " + shownQuestion.question;
    // "shownQuestion.question", caminho para puxar o valor do "atributo" question
    // sw utilizar o innerText por não ser um elemento existente no documento html

    optionsElement.innerHTML = "";
    shownQuestion.options.forEach(eAsports => {
        const optionBtn = document.createElement("button"); // cria elemento 'botão'
        optionBtn.classList.add("answersBtn");
        optionBtn.innerText = eAsports;
        optionsElement.appendChild(optionBtn); // adiciona um botão no documento html
        optionBtn.addEventListener("click", selectAnswer);
        // define uma função para acontecer quando ao clicar o elemento 'botão'
    });
}

// FUNÇÃO DE COMO PROCEDER AO SELECIONAR UMA RESPOSTA
function selectAnswer(yeeeeyMen) {
    const selectedButton = yeeeeyMen.target;
    const answer = shittyAiQuiz[questionIndex].answer;
    let right = false;

    if (selectedButton.innerText === answer) {
        score++;
        right = true;
    }

    answersBar(right);
    progressBar();

    questionIndex++;

    if (answeredQuestionsIndex.length < shittyAiQuiz.length) {
        showQuestion();
    } else {
        showResult();
    }
}

showQuestion(); // chama a função "showQuestion()"