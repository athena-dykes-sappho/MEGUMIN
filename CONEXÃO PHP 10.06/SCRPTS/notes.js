/* ------------------------------------------------------------------------------


    const dentro do const (var y inside var x will have values inherited from y to x)
    {
        Termo oficial: [ -- ARRAY -- ]
        
        (example: let frutas = ['maca', 'banana', 'pera', 'alface'];)
    }
        
    const dentro do const (var inside var(child=parent value))
    {
        Termo oficial: [ -- YetTBA -- ]
    }
    
    const dentro de function (var inside a pseudo-class, houses code blocks n values)
    {
        Termo Oficial: [ -- YetTBA -- ]

        (example: a room inside a house)

        (example:
            function numberMinusTwo (number) { // an implicitly declared variable == parameter (within a function)
                const two = 2;

                return number - two; // retorna um valor
            };

            let result = numberMinusTwo(20); // creates var where it directly calls for function to equate in values to the var
        )
    }
        
   ------------------------------------------------------------------------------

    function repeatText (text, times) { // parametros são variaveis da função que receberão um valor de fora // ex: input
        let i = 0; // const é imutavel, let é variável nrml blz

        while (i < times) { // (i < times) = condição =/= parametro

            console.log(text); //echo
            i++; // ++ soma um valor a mais (ex: let a = 2; a++; 'a agora é 3')
        }
    }

   ------------------------------------------------------------------------------

    setInterval(function() {  // pre-established code (method and funct)
        // 'function ()' função a ser chamada // se já tiver ua função criada antes, é só chamar pelo nome
        console.log('oi');
    }, 1000) // '1000' intervalo de tempo (em milisegundos)

   ------------------------------------------------------------------------------

    parametro = {
        variaveis definidas para o uso de uma função, seus valores recebidos de fora;

        function somar(a, b) {
            return a + b;
        }
    }

    condição = {
        condição estabelecida para executar o bloco de código dentro de um while, if, else if, for, forEach...

        if(love === true) {
            console.log('ti amo :3');
        }
        else {
            console.log('oi');
        }
    }

    father:nth-child(n) = {
        n = a posição da criança (primeira, segunda, ou terceira); // ordinal

        html:nth-child(3) div {
            background-color: red;
        }

        <html>
            <div></div>
            <div></div>
            <div></div> // div afetada
        </html>
    }

    index de array = {
        o 'id' do item do array (começa no 0)

        const indexsArray = [0, 1, 2, 3, ...];
    }

   ------------------------------------------------------------------------------
*/