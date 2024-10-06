/* =========================================================================== */
/* --------------------------------------------------------------------------- */

/*  -- SQUEEZE FUNCTION --  */

/* --------------------------------------------------------------------------- */

/*  > Consts >  */

const elementMegumi = document.getElementById('logo');
const elementAudio = document.getElementById('audio');

const SFX = [
    'SNDS/squeeze1.wav',
    'SNDS/squeeze2.wav',
    'SNDS/squeeze3.wav',
    'SNDS/squeeze4.wav',
    'SNDS/squeeze5.wav'
];

const heartColors = [ // array: varíavel que abriga outras varíaveis (cochetes [])
    '--color-blue1-trans',
    '--color-blue2-trans',
    '--color-blue3-trans',
    '--color-blue4-trans'
];

const heartScales = [
    25,
    20,
    15,
    10,
    8
];

const heartDirections = [
    'heart-to-right',
    'heart-to-left'
];

const heartTops = [
    0.2,
    0.3,
    0.4,
    0.5,
    0.6,
    0.7
];

/* --------------------------------------------------------------------------- */

/*  > Document Changes >  */

document.documentElement.style.setProperty('--size-heart-margin-l', `${(elementMegumi.offsetWidth * 0.5)}px`);

/* --------------------------------------------------------------------------- */

/*  > General Functions >  */

function randomize(array) { return array[Math.floor(Math.random() * array.length)]; }

/* --------------------------------------------------------------------------- */

/*  > Hearts >  */

function megumiHearts() {
    /* -- Creating SVG Element */
    const svgHeart = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>';
    
    /* -- Creating Heart Element */
    const elementHeart = document.createElement('div');

        /* --> Defining its HTML properties */
        elementHeart.innerHTML = svgHeart;

        /* --> Defining its CSS properties */
        /*------- Classes -------*/
        elementHeart.classList.add('heart');
        elementHeart.classList.add(randomize(heartDirections));
        
        /*------- Styles -------*/
        elementHeart.style.fill = 'var('+randomize(heartColors)+')';

        let size = randomize(heartScales);
        elementHeart.style.width = size+'px';
        elementHeart.style.height = size+'px';
        
        elementHeart.style.top = (elementMegumi.offsetHeight * randomize(heartTops))+'px'; 

        // if the element is to the left, this set its margin-left; thus it won't be touching the right-hearts
        if (elementHeart.classList.contains(heartDirections[1])) { elementHeart.style.marginRight = 'var(--size-heart-margin-l)'; }

    /* -- Adding Heart Element within the HTML document */
    elementMegumi.appendChild(elementHeart);

    /* -- Removing Heart Element from the HTML document */
    setInterval(() =>{
        elementHeart.remove();
    }, 6000) // 6 segundos para o coração ser deletado
}

/* --------------------------------------------------------------------------- */

/*  > Audio Play & Heart Summon >  */

elementMegumi.addEventListener('click', () => {
    let i = Math.floor(Math.random() * SFX.length); // gera um número inteiro aleatório entre 0 e o comprimento do array

    // "Math.random()" gera um número aleatório       (podendo ser um quebrado)
    // "Math.floor()" serve para nivelar o número aleatório, o tornando inteiro

    // adiciona o áudio no html
    elementAudio .innerHTML = `                   
    <audio id="voiceline" autoplay>
        <source src="${SFX[i]}" type="audio/wav">
    </audio>
    `;

    megumiHearts();
});

/* --------------------------------------------------------------------------- */
/* =========================================================================== */
/* --------------------------------------------------------------------------- */

/*  -- Meguna Switch --  */

/* --------------------------------------------------------------------------- */

/*  > Consts >  */

const elementMeguminImg = document.getElementById('megumi');
const buttonMeguna = document.getElementById('meguna-btn');
const buttonMegumin = document.getElementById('megumin-btn');

const imagesSukuna = [
    '--image-sukuna1',
    '--image-sukuna2',
    '--image-sukuna3',
    '--image-sukuna4',
    '--image-sukuna5',
];

const imagesMegumi = [
    '--image-megumi1',
    '--image-megumi2',
    '--image-megumi3',
    '--image-megumi4',
    '--image-megumi5',
];

/* --------------------------------------------------------------------------- */

/*  > Change Theme >  */

buttonMeguna.addEventListener('click', () => {
    elementMeguminImg.classList.add('image-meguna');
    changeMegumiState();
    localStorage.setItem('meguminState', elementMeguminImg.classList.contains('image-meguna'));
});

buttonMegumin.addEventListener('click', () => {
    elementMeguminImg.classList.remove('image-meguna');
    changeMegumiState();
    localStorage.setItem('meguminState', elementMeguminImg.classList.contains('image-meguna'));
});

// elementMeguminImg.style.top = (document.body.offsetHeight * 0.7)+'px';


/* --------------------------------------------------------------------------- */

/*  > Storage Preferences >  */

const yuujiDismantle = localStorage.getItem('meguminState');

if (yuujiDismantle  === "true") {
    elementMeguminImg.classList.add('image-meguna');
}

/* --------------------------------------------------------------------------- */

/*  > Change Image (according to its class) >  */

function changeMegumiState () {
    if (elementMeguminImg.classList.contains('image-meguna')) { elementMeguminImg.style.backgroundImage = 'var('+randomize(imagesSukuna)+')'; }
    else { elementMeguminImg.style.backgroundImage = 'var('+randomize(imagesMegumi)+')'; }
}

window.onload = changeMegumiState();

setInterval(changeMegumiState, 8000);

/* --------------------------------------------------------------------------- */
/* =========================================================================== */
/* --------------------------------------------------------------------------- */