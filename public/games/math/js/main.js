var fps = 1; // 1 frame por segundo
var jogador;
var inimigos = [];
var resultado;
var nivel;
var pont_nivel; // variável para definir nível máximo pela pontuação
var pontuacao;
var moedas;
var vidas = [];
var gui = [];
var botoesGui = [];
var link = 'https://raw.githubusercontent.com/Dellg/excursao-matematica/master/';
var tempoMax = 1200;
var tempo;
var fonte;
var fonteSize;
var fonteStroke;
var txtPointsSize;
var txtPointsColor = 1; // 0 = vermelho, 1 = branco, 2 = verde
var txtMoedasSize;
var txtMoedasColor = 1; // 0 = vermelho, 1 = branco, 2 = verde
var imagensPlayer = [];
var imagensInimigo = [];
var imagemParticula;
var quantidadeInimigos = 15;
var tamanhoSprites = 60; // as imagens do jogador e dos inimigos são sprites de 120x120
var pontoParticulas = [];
var velocidadeGlobal = document.documentElement.clientWidth * 0.0005;
var telaID = 0; // variável para saber em qual tela o jogo está, 0= menu principal
var escala;
var vetorParticulas = [];
var backgrounds = [];
var layersX = [];

// carregando fonte e imagens
function preload(){
  // impedir que apareça o Scroll na página
  document.documentElement.style.overflow = 'hidden';
  document.body.scroll = "no";
  escala = map(document.documentElement.clientHeight, 500, 1080, 1, 3);
  fonteSize = 20 * escala + escala;
  txtPointsSize = fonteSize;
  txtMoedasSize = fonteSize;
  fonteStroke = map(document.documentElement.clientHeight, 500, 1080, 4, 7);

  fonte = loadFont(link + 'img/gui/patrick-hand.ttf');
  for (var i = 0; i < 3; i++){
    backgrounds.push(loadImage(link + 'img/background/layer' + i + '.png'));
    layersX.push(0);
  }
  for (var i = 0; i < 5; i++){
    gui.push(loadImage(link + 'img/gui/gameplay/gameplay_gui' + i + '.png'));
  }
  for (var i = 0; i < 5; i++){
    imagensPlayer.push(loadImage(link + 'img/good_npcs/player' + i + '.png'));
  }
  for (var i = 0; i < 10; i++){
    imagensPlayer.push(loadImage(link + 'img/good_npcs/kid' + i + '.png'));
  }
  for (var i = 0; i < quantidadeInimigos; i++){
    imagensInimigo.push(loadImage(link + 'img/bad_npcs/enemy' + i + '.png'));
  }
  imagemParticula = loadImage(link + 'img/background/particulas.png');
}

// função de iniciar o jogo, mostra interface da calculadora
function iniciouJogo(){
  // inicializando variáveis do jogo e adicionando crianças ao vetor
  nivel = 0;
  pont_nivel = 0;
  pontuacao = 0;
  moedas = 0;
  tempo = tempoMax;
  resultado = "";

  for (var i = 0; i < 10; i++){
    vidas.push(new Crianca(imagensPlayer[5 + i]));
  }
  ordenaCriancas();

  telaID = 1;
  btNovoJogo.hide();
  btZero.show();
  btUm.show();
  btDois.show();
  btTres.show();
  btQuatro.show();
  btCinco.show();
  btSeis.show();
  btSete.show();
  btOito.show();
  btNove.show();
  btOk.show();
  btDel.show();
}

// perdeu o jogo
function reiniciaJogo(){
  telaID = 0;
  btNovoJogo.show();
  btZero.hide();
  btUm.hide();
  btDois.hide();
  btTres.hide();
  btQuatro.hide();
  btCinco.hide();
  btSeis.hide();
  btSete.hide();
  btOito.hide();
  btNove.hide();
  btOk.hide();
  btDel.hide()
}

function setup(){
  var canvas = createCanvas(document.documentElement.clientWidth, document.documentElement.clientHeight);
  jogador = new Jogador("nome", imagensPlayer[0]);

  // Interface ID= 0, menu principal
  textFont(fonte, 34);
  btNovoJogo = createButton("Iniciar Jogo");
  btNovoJogo.size(100, 100);
  btNovoJogo.position(width/2 - btNovoJogo.width/2, height/2 - btNovoJogo.height/2);
  btNovoJogo.touchEnded(function t() { iniciouJogo() });

  // Interface ID= 1, em jogo
  // Criação dos botões da calculadora para ser clicável com mouse
  var tamanhoBotaoX = 30 * escala;
  var tamanhoBotaoY = 25 * escala;
  btZero = createButton("0");
  btZero.size(tamanhoBotaoX,tamanhoBotaoY);
  btZero.style('font-size', fonteSize + 'px');
  btZero.position((74 - escala * 5) * escala, height - (70 - escala * 6) * escala);
  btZero.touchEnded(function t() { botaoPressionado(btZero.elt.innerText); });
  btZero.hide();
  botoesGui.push(btZero);
  btUm = createButton("1");
  btUm.size(tamanhoBotaoX,tamanhoBotaoY);
  btUm.style('font-size', fonteSize + 'px');
  btUm.position((39 - escala * 5) * escala, height - (96 - escala * 6) * escala);
  btUm.touchEnded(function t() { botaoPressionado(btUm.elt.innerText); });
  btUm.hide();
  botoesGui.push(btUm);
  btDois = createButton("2");
  btDois.size(tamanhoBotaoX,tamanhoBotaoY);
  btDois.style('font-size', fonteSize + 'px');
  btDois.position((74 - escala * 5) * escala, height - (96 - escala * 6) * escala);
  btDois.touchEnded(function t() { botaoPressionado(btDois.elt.innerText); });
  btDois.hide();
  botoesGui.push(btDois);
  btTres = createButton("3");
  btTres.size(tamanhoBotaoX,tamanhoBotaoY);
  btTres.style('font-size', fonteSize + 'px');
  btTres.position((109 - escala * 5) * escala, height - (96 - escala * 6) * escala);
  btTres.touchEnded(function t() { botaoPressionado(btTres.elt.innerText); });
  btTres.hide();
  botoesGui.push(btTres);
  btQuatro = createButton("4");
  btQuatro.size(tamanhoBotaoX,tamanhoBotaoY);
  btQuatro.style('font-size', fonteSize + 'px');
  btQuatro.position((39 - escala * 5) * escala, height - (122 - escala * 6) * escala);
  btQuatro.touchEnded(function t() { botaoPressionado(btQuatro.elt.innerText); });
  btQuatro.hide();
  botoesGui.push(btQuatro);
  btCinco = createButton("5");
  btCinco.size(tamanhoBotaoX,tamanhoBotaoY);
  btCinco.style('font-size', fonteSize + 'px');
  btCinco.position((74 - escala * 5) * escala, height - (122 - escala * 6) * escala);
  btCinco.touchEnded(function t() { botaoPressionado(btCinco.elt.innerText); });
  btCinco.hide();
  botoesGui.push(btCinco);
  btSeis = createButton("6");
  btSeis.size(tamanhoBotaoX,tamanhoBotaoY);
  btSeis.style('font-size', fonteSize + 'px');
  btSeis.position((109 - escala * 5) * escala, height - (122 - escala * 6) * escala);
  btSeis.touchEnded(function t() { botaoPressionado(btSeis.elt.innerText); });
  btSeis.hide();
  botoesGui.push(btSeis);
  btSete = createButton("7");
  btSete.size(tamanhoBotaoX,tamanhoBotaoY);
  btSete.style('font-size', fonteSize + 'px');
  btSete.position((39 - escala * 5) * escala, height - (148 - escala * 6) * escala);
  btSete.touchEnded(function t() { botaoPressionado(btSete.elt.innerText); });
  btSete.hide();
  botoesGui.push(btSete);
  btOito = createButton("8");
  btOito.size(tamanhoBotaoX,tamanhoBotaoY);
  btOito.style('font-size', fonteSize + 'px');
  btOito.position((74 - escala * 5) * escala, height - (148 - escala * 6) * escala)
  btOito.touchEnded(function t() { botaoPressionado(btOito.elt.innerText); });
  btOito.hide();
  botoesGui.push(btOito);
  btNove = createButton("9");
  btNove.size(tamanhoBotaoX,tamanhoBotaoY);
  btNove.style('font-size', fonteSize + 'px');
  btNove.position((109 - escala * 5) * escala, height - (148 - escala * 6) * escala);
  btNove.touchEnded(function t() { botaoPressionado(btNove.elt.innerText); });
  btNove.hide();
  botoesGui.push(btNove);
  btDel = createButton("del");
  btDel.size(tamanhoBotaoX,tamanhoBotaoY);
  btDel.style('font-size', (fonteSize - 3) + 'px');
  btDel.position((40 - escala * 5) * escala, height - (70 - escala * 6) * escala);
  btDel.touchEnded(function t() { botaoPressionado(btDel.elt.innerText); });
  btDel.hide();
  botoesGui.push(btDel);
  btOk = createButton("ok");
  btOk.size(tamanhoBotaoX,tamanhoBotaoY);
  btOk.style('font-size', (fonteSize - 3) + 'px');
  btOk.position((107 - escala * 5) * escala, height - (70 - escala * 6) * escala);
  btOk.touchEnded(function t() { botaoPressionado(btOk.elt.innerText); });
  btOk.hide();
  botoesGui.push(btOk);
}

function draw(){
  background(140, 213, 245);
  if (width < 350 || height < 500){
    push();
    stroke(0);
    fill(255);
    strokeWeight(fonteStroke);
    textAlign(CENTER);
    textFont(fonte, 25);
    text("Resolução Não Suportada", width/2 - width/4, height/2 - 60, width/2, height/2);
    textFont(fonte, 12);
    text("É necessário pelo menos 350x500", width/2 - width/4, height/2 + 30, width/2, height/2 + 60);
    pop();
    for (var i = botoesGui.length - 1; i >= 0; i--){
      botoesGui[i].remove();
      btNovoJogo.remove();
    }
    noLoop();
    return false;
  }

  if (telaID == 0){

  } else if (telaID == 1){
    // desenha layers do background, é calculado quantas repetições da layer são necessárias
    var repeticaoLayer = 1 + ceil(width/backgrounds[0].width);
    for (var i = 0; i < repeticaoLayer; i++){
      desenhaEscalonado(backgrounds[2], layersX[2] + (i * backgrounds[2].width * escala), 0);
    }
    for (var i = 0; i < repeticaoLayer; i++){
      desenhaEscalonado(backgrounds[1], layersX[1] + (i * backgrounds[1].width * escala), 0);
    }
    for (var i = 0; i < repeticaoLayer; i++){
      desenhaEscalonado(backgrounds[0], layersX[0] + (i * backgrounds[0].width * escala), 0);
    }

    // movimentação para efeito de Parallax Background
    layersX[2] -= 0.1;
    if (layersX[2] < -backgrounds[2].width * escala){
      layersX[2] = 0;
    }
    layersX[1] -= 0.5;
    if (layersX[1] < -backgrounds[1].width * escala){
      layersX[1] = 0;
    }
    layersX[0] -= 1;
    if (layersX[0] < -backgrounds[0].width * escala){
      layersX[0] = 0;
    }

    // verifica tamanho da fonte dos botões para diminuir se necessário
    for (var i = 0; i < 12; i++){
      var fonteBotao = botoesGui[i].elt.style.fontSize;
      if (botoesGui[i].elt.innerText == "del" || botoesGui[i].elt.innerText == "ok"){
        if (fonteBotao > fonteSize - 2 + 'px'){
          botoesGui[i].style('font-size', int(fonteBotao) - 1 + 'px');
        }
      } else {
        if (fonteBotao > fonteSize + 'px'){
          botoesGui[i].style('font-size', int(fonteBotao) - 1 + 'px');
        }
      }
    }

    // Criação da interface do jogo
    fill(255);
    desenhaEscalonado(gui[0], 15, 15);
    desenhaEscalonado(gui[1], width - gui[1].width * escala - 15, 15);
    desenhaEscalonado(gui[2], 15, height - gui[2].height * escala - 15);
    if (width >= height){
      desenhaEscalonado(gui[3], width/2 - gui[3].width/2 * escala + gui[3].width/25, height - 130 * escala);
    } else {
      desenhaEscalonado(gui[3], width/2 - gui[3].width/2 * escala + gui[3].width/25, height - 225 * escala);
    }
    desenhaEscalonado(gui[4], width - gui[4].width * escala - 15, height - gui[4].height * escala - 15);

    // controle de partículas, apaga assim que possível para manter o canvas limpo
    for (var i = vetorParticulas.length - 1; i >= 0; i--){
      if (vetorParticulas[i].show()){
        vetorParticulas.splice(i, 1);
      }
    }

    jogador.update();
    jogador.show();
    for (var i = vidas.length - 1; i >= 0; i--){
      vidas[i].update();
      vidas[i].show();
      if (vidas[i].fugiu()){
        vidas.splice(i, 1);
        if (vidas.length === 0){
          reiniciaJogo();
        }
      }
    }
    ordenaCriancas();
    textFont(fonte, fonteSize);
    stroke(0);
    strokeWeight(fonteStroke);
    if (width >= height){
      text(resultado, width/2 - 60 * escala + gui[3].width/25, height - 98 * escala);
    } else {
      text(resultado, width/2 - 60 * escala + gui[3].width/25, height - 194 * escala);
    }
    text(nivel, (85 - escala * 3) * escala, (45 - escala * 5) * escala);

    // feedback na cor e tamanho da fonte das moedas quando pega alguma
    textFont(fonte, txtMoedasSize);
    if (txtMoedasSize > fonteSize){
      txtMoedasSize -= 0.25 * escala;
    }
    if (txtMoedasColor > 1){
      fill(lerpColor(color(0,255,0), color(255,255,255), txtMoedasColor/3));
      txtMoedasColor -= 0.25;
    } else if (txtMoedasColor < 1){
      fill(lerpColor(color(255,123,123), color(255,255,255), txtMoedasColor));
      txtMoedasColor += 0.25;
    } else {
      fill(255);
    }
    text(moedas, width - 65 * escala, (53 - escala * 5) * escala);

    // feedback na cor e tamanho da fonte dos pontos quando erra ou acerta
    textFont(fonte, txtPointsSize);
    if (txtPointsSize > fonteSize){
      txtPointsSize -= 0.25 * escala;
    }
    if (txtPointsColor > 1){
      fill(lerpColor(color(0,255,0), color(255,255,255), txtPointsColor/3));
      txtPointsColor -= 0.25;
    } else if (txtPointsColor < 1){
      fill(lerpColor(color(255,123,123), color(255,255,255), txtPointsColor));
      txtPointsColor += 0.25;
    } else {
      fill(255);
    }
    text(pontuacao, width - 138 * escala, (53 - escala * 5) * escala);

    // desenha o ponteiro do temporizador
    push();
    angleMode(DEGREES);
    var angulo = map(tempo, tempoMax, 0, 360, 0);
    stroke(255);
    strokeWeight(fonteStroke);
    translate(width - gui[4].width/2 * escala - 12, height - gui[4].height/2 * escala - (height/1000) + (height/75) * escala);
    rotate(angulo);
    line(0, 0, 0, -30 * escala);
    pop();

    // adiciona inimigo se o temporizador terminar
    if (tempo < 0){
      var idInimigo = floor(random(0, quantidadeInimigos));
      inimigos.push(new Inimigo(nivel, false, imagensInimigo[idInimigo], idInimigo));
      tempo = tempoMax;
    } else {
      tempo--;
    }
    // adiciona inimigo se não tiver nenhum
    if (inimigos.length == 0){
      var idInimigo = floor(random(0, quantidadeInimigos));
      inimigos.push(new Inimigo(nivel, false, imagensInimigo[idInimigo], idInimigo));
      tempo = tempoMax;
    } else {
      for (var i = inimigos.length - 1; i >= 0; i--){
        inimigos[i].update();
        inimigos[i].show();
        if (inimigos[i].atingiuJogador()){
          if (!inimigos[i].sumindo){
            vidas[round(random(0, vidas.length - 1))].correndo = true;
            inimigos[i].sumindo = true;
          }
        }
        if (inimigos[i].alpha <= 0){
          inimigos.splice(i, 1);
        }
      }
    }

    // verifica se os pontos (partículas) chegaram ao destino para adicionar à pontuação
    for (var i = pontoParticulas.length - 1; i >= 0; i--){
      pontoParticulas[i].show();
      // partícula de ponto
      if (pontoParticulas[i].tipo == 0){
        if (pontoParticulas[i].movimenta(createVector(width - 138 * escala, (53 - escala * 5) * escala))){
          txtPointsColor = 2; // muda para verde
          txtPointsSize = 26 * escala; // muda tamanho da fonte

          pontuacao += int(pontoParticulas[i].valor);
          if (pont_nivel < pontuacao){
            pont_nivel = pontuacao;
          }
          if (nivel < int(pont_nivel / 30)){
            nivel = int(pont_nivel / 30);
            tempoMax -= 5;
          }
          pontoParticulas.splice(i, 1);
        }
      // partícula de moeda
      } else if (pontoParticulas[i].tipo == 1){
        if (pontoParticulas[i].movimenta(createVector(width - 65 * escala, (53 - escala * 5) * escala))){
          txtMoedasColor = 2; // muda para verde
          txtMoedasSize = 26 * escala; // muda tamanho da fonte

          moedas += int(pontoParticulas[i].valor);
          pontoParticulas.splice(i, 1);
        }
      }
    }
  }
}

// verifica se o botão digitado é um número
function botaoPressionado(botao){
  if (botao == "del" && resultado.length > 0){
    btDel.elt.style.fontSize = fonteSize + 5 + "px";
    resultado = resultado.substring(0, resultado.length - 1);
  } else if (botao == "ok" && resultado.length > 0){
    btOk.elt.style.fontSize = fonteSize + 5 + "px";
    enterPressionado();
  } else {
    if (botao == "del" || botao == "ok"){
      return;
    }
    if (resultado.length < 12){
      botoesGui[botao].elt.style.fontSize = fonteSize + 8 + "px";
      resultado += "" + botao;
    }
  }
  return false;
}

// verifica se o botão digitado é um número
function keyPressed(){
  if (match(key, "^\\d+$")){
    if (resultado.length < 12){
      botoesGui[key].elt.style.fontSize = fonteSize + 8 + "px";
      resultado += "" + key;
    }
  // valores para o Numpad, diminui 96 do keyCode
  } else if (keyCode >= 96 && keyCode <= 105){
    if (resultado.length < 12){
      botoesGui[keyCode - 96].elt.style.fontSize = fonteSize + 8 + "px";
      resultado += "" + keyCode - 96;
    }
  } else if (keyCode == BACKSPACE && resultado.length > 0){
    btDel.elt.style.fontSize = fonteSize + 5 + "px"
    resultado = resultado.substring(0, resultado.length - 1);
  // se pressiona enter ou espaço
  } else if (keyCode == ENTER && resultado.length > 0 || keyCode == 32 && resultado.length > 0){
    btOk.elt.style.fontSize = fonteSize + 5 + "px";
    enterPressionado();
  }
}

// verifica se o Enter foi pressionado para enviar o resultado
function enterPressionado(){
  if (resultado == ""){
    return;
  }
  matou = false;
  for (var i = inimigos.length - 1; i >= 0; i--){
    if (inimigos[i].derrotado(resultado)){
      matou = true;
      // cria partícula de ponto com valor dependendo da operação
      var xtemp = inimigos[i].x + tamanhoSprites/2;
      var ytemp = inimigos[i].y + tamanhoSprites/2;
      switch (inimigos[i].sinal) {
        case "x":
          pontoParticulas.push(new Ponto(0, "5", xtemp, ytemp));
          break;
        case "/":
          pontoParticulas.push(new Ponto(0, "8", xtemp, ytemp));
          break;
        default:
          pontoParticulas.push(new Ponto(0, "3", xtemp, ytemp));
          break;
      }
      inimigos[i].sumindo = true;
      for (var k = 0; k < round(random(4, 9)); k++){
        vetorParticulas.push(new Particula(xtemp, ytemp, 0));
      }
      if (round(random(-0.49, 9.49)) == 9){
        vetorParticulas.push(new Moeda(xtemp + tamanhoSprites/4, ytemp + tamanhoSprites/1.5));
      }
    }
  }
  // perde ponto se errou uma operação
  if (!matou){
    if (pontuacao >= 5){
      pontuacao -= 5;
    } else {
      pontuacao = 0;
    }
    txtPointsColor = 0; // muda para vermelho
    txtPointsSize = 26 * escala + escala; // muda tamanho da fonte
  }
  resultado = "";
}

// função que desenha objetos na tela levando em consideração a escala
function desenhaEscalonado(objeto, coordenadaX, coordenadaY){
  push();
  noSmooth();
  translate(coordenadaX, coordenadaY);
  scale(escala);
  image(objeto, 0, 0);
  smooth();
  pop();
}

function mousePressed(){
  for (var i = vetorParticulas.length - 1; i >= 0; i--){
    if (vetorParticulas[i].constructor.name == "Moeda"){
      if (vetorParticulas[i].mousePressed()){
        vetorParticulas.splice(i, 1);
      }
    }
  }
}

// função que ordena as crianças baseado na posição Y delas
function ordenaCriancas(){
  var troca;
  for (var i = 1; i < vidas.length; i++){
    troca = false;
    for (var j = 1; j < vidas.length; j++){
      if (vidas[j - 1].y < vidas[j].y){
        aux = vidas[j - 1];
        vidas[j - 1] = vidas[j];
        vidas[j] = aux;
        troca = true;
      }
    }
    if (!troca){
      return;
    }
  }
}
