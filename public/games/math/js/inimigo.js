//______________________________________________________________________________
// Inimigo é a função que trata dos inimigos.
// recebe um nível de dificuldade, se está furioso, a imagem e o ID da imagem.
//______________________________________________________________________________
function Inimigo(nivel, furioso, imagem, id){
  this.id = id;
  this.frame = 0;
  this.animFrame = 0;
  this.animLine = 0;
  this.sumindo = false;
  this.alpha = 255;
  // definindo a operação de acordo com o nível do jogador
  this.numero1 = int(random(floor(nivel/2), 2 * (nivel + 1)));
  this.numero2 = int(random(floor(nivel/2), 2 * (nivel + 1)));
  this.sinal = "+";
  num = int(random(4));
  if (num == 1){
    if (nivel >= 2){
      this.numero1 = int(random(floor(nivel/2), 3 * (nivel - 1)));
      this.numero2 = int(random(floor(nivel/2), 3 * (nivel - 1)));
      this.sinal = "-";
      if (this.numero2 > this.numero1){
        aux = this.numero1;
        this.numero1 = this.numero2;
        this.numero2 = aux;
      }
    }
  } else if (num == 2){
    if (nivel >= 4){
      this.numero1 = int(random(floor(nivel/2), 1 + (nivel - 2)));
      this.numero2 = int(random(floor(nivel/2), 1 + (nivel - 2)));
      this.sinal = "x";
    }
  } else if (num == 3){
    if (nivel >= 6){
      this.sinal = "/";
      resultado_operacao = int(random(floor(nivel/2), (nivel-2)));
      this.numero2 = round(random(1, resultado_operacao/2));
      this.numero1 = resultado_operacao * this.numero2;
    }
  }

  this.furioso = furioso;
  this.imagem = imagem;
  this.x = width;
  if (width >= height){
    this.y = random(75 + (10 * escala), height/2 - 15 * escala);
  } else {
    this.y = random(75 + (10 * escala), height/2 - tamanhoSprites * escala);
  }
  this.velocidadeX = velocidadeGlobal + (nivel/100);
  this.velocidadeY = random(-0.0025, 0.0025);
}

Inimigo.prototype.update = function(){
  if (!this.sumindo){
    this.x -= this.velocidadeX;
    this.y += this.velocidadeY;
    if (this.y < 75 + (10 * escala)){
      this.velocidadeY += random(0.0025, 0.003);
    } else if (this.y > height/2 - tamanhoSprites * escala || ((width >= height) && (this.y > height/2 - 15 * escala))){
      this.velocidadeY += random(-0.003, -0.0025);
    } else {
      this.velocidadeY += random(-0.0025, 0.0025);
    }

    if (this.velocidadeY > 0.06){
      this.velocidadeY = 0.06;
    } else if (this.velocidadeY < -0.06){
      this.velocidadeY = -0.06;
    }
  }
}

Inimigo.prototype.show = function(){
  if (this.sumindo){
    // noSmooth() serve para escalonar o objeto usando NearestNeighbor para não perder qualidade do pixel
    push();
    noSmooth();
    imgp = this.imagem.get(this.animFrame, this.animLine, tamanhoSprites, tamanhoSprites);
    translate(this.x, this.y);
    scale(escala);
    tint(255, this.alpha);
    image(imgp, 0, 0); // desenha a imagem no canvas
    smooth();
    pop();
    this.alpha -= 20;
  } else {
    // criaturas com animação de uma linha em sequência
    if (this.id == 0 || this.id == 1){
      if (this.frame >= 0 && this.frame < 5){
        this.animFrame = 0;
        this.frame += fps;
      } else if (this.frame >= 5 && this.frame < 10){
        this.animFrame = tamanhoSprites;
        this.frame += fps;
      } else if (this.frame >= 10 && this.frame < 15){
        this.animFrame = tamanhoSprites * 2;
        this.frame += fps;
      } else if (this.frame >= 15 && this.frame < 20){
        this.animFrame = tamanhoSprites * 3;
        this.frame += fps;
      } else if (this.frame >= 20 && this.frame < 25){
        this.animFrame = tamanhoSprites * 4;
        this.frame += fps;
      } else {
        this.animLine = 0;
        this.animFrame = 0;
        this.frame = 0;
      }

    // criaturas com animação de uma linha com ciclo
    } else if (this.id >= 2 && this.id < 11){
      if (this.frame >= 0 && this.frame < 5 || this.frame >= 20 && this.frame < 25){
        this.animFrame = tamanhoSprites * 2;
        this.frame += fps;
      } else if (this.frame >= 5 && this.frame < 10 || this.frame >= 15 && this.frame < 20){
        this.animFrame = tamanhoSprites;
        this.frame += fps;
      } else if (this.frame >= 10 && this.frame < 15){
        this.animFrame = 0;
        this.frame += fps;
      } else if (this.frame >= 25 && this.frame < 30 || this.frame >= 35 && this.frame < 40){
        this.animFrame = tamanhoSprites * 3;
        this.frame += fps;
      } else if (this.frame >= 30 && this.frame < 35){
        this.animFrame = tamanhoSprites * 4;
        this.frame += fps;
      } else {
        this.animLine = 0;
        this.animFrame = tamanhoSprites * 2;
        this.frame = 0;
      }

    // criaturas com animação de duas linhas em sequência
    } else {
      if (this.frame >= 0 && this.frame < 5){
        this.animLine = 0;
        this.animFrame = 0;
        this.frame += fps;
      } else if (this.frame >= 5 && this.frame < 10){
        this.animLine = 0;
        this.animFrame = tamanhoSprites;
        this.frame += fps;
      } else if (this.frame >= 10 && this.frame < 15){
        this.animLine = 0;
        this.animFrame = tamanhoSprites * 2;
        this.frame += fps;
      } else if (this.frame >= 15 && this.frame < 20){
        this.animLine = 0;
        this.animFrame = tamanhoSprites * 3;
        this.frame += fps;
      } else if (this.frame >= 20 && this.frame < 25){
        this.animLine = tamanhoSprites;
        this.animFrame = 0;
        this.frame += fps;
      } else if (this.frame >= 25 && this.frame < 30){
        this.animLine = tamanhoSprites;
        this.animFrame = tamanhoSprites;
        this.frame += fps;
      } else if (this.frame >= 30 && this.frame < 35){
        this.animLine = tamanhoSprites;
        this.animFrame = tamanhoSprites * 2;
        this.frame += fps;
      } else if (this.frame >= 35 && this.frame < 40){
        this.animLine = tamanhoSprites;
        this.animFrame = tamanhoSprites * 3;
        this.frame += fps;
      } else {
        this.animLine = 0;
        this.animFrame = 0;
        this.frame = 0;
      }
    }

    // noSmooth() serve para escalonar o objeto usando NearestNeighbor para não perder qualidade do pixel
    push();
    noSmooth();
    imgp = this.imagem.get(this.animFrame, this.animLine, tamanhoSprites, tamanhoSprites);
    translate(this.x, this.y);
    scale(escala);
    image(imgp, 0, 0); // desenha a imagem no canvas
    smooth();

    fill(255);
    textFont(fonte, 16);
    strokeWeight(3);
    textAlign(CENTER);
    text(this.numero1 + this.sinal + this.numero2, 0 + tamanhoSprites/2, 0 + tamanhoSprites + 12);
    textAlign(LEFT);
    pop();
  }
}

Inimigo.prototype.atingiuJogador = function(){
  return (this.x < width/4);
}

// verifica se o jogador derrotou o inimigo
Inimigo.prototype.derrotado = function(resultado){
  if (!this.sumindo){
    if (this.sinal == "+"){
      if (this.numero1 + this.numero2 == resultado)
        return true;
    } else if (this.sinal == "-"){
      if (this.numero1 - this.numero2 == resultado)
        return true;
    } else if (this.sinal == "x"){
      if (this.numero1 * this.numero2 == resultado)
        return true;
    } else if (this.sinal == "/"){
      if (this.numero1 / this.numero2 == resultado)
        return true;
    }
  }
}
