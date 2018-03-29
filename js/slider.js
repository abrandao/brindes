/** Pega todos os elementos li da lista não ordenada retornando um objeto Nodelist, de acordo com posicionamento encontrado no documento. */
var sliders = document.querySelectorAll('#sliders li');

/** Define o índice, que será responsável por informar qual é o slider atual */
var current = 0;

/** Retornar o total de itens do slide. Diminui menos 1, devido o primeiro item começar com zero.
Se temos 2 itens, sua posição: 0,1,2 */
var total = sliders.length - 1;

/** Executaremos uma função em um intervalo de tempo. E definiremos que executará em 2000 milisegundos */
window.setInterval(function() {
  
  /** A variável index será responsável pela posição de elemento que iremos remover a classe */
  var index = current ? current -1 : total;

  /** Pega o elemento para remover a classe */
  sliders[index].className = '';

  /** Adiciona a classe no elemento atual */
  sliders[current].className = 'slider-active';

  /** Calcular a posição do próximo elemento que será exibido */
  current = current >= total ? 0 : current+1;
}, 6000);