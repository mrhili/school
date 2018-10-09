//______________________________________________________________________________
// Particula é a função que trata das partículas que os inimigos gerarão ao
// serem derrotados. Recebe posições X e Y do inimigo derrotado.
// tipo da partícula diz se é fumaça (0), ou brilho (1)
//______________________________________________________________________________
function Particula(x, y, tipo){
  this.tipo = tipo;
  this.rotacao = random(0, 360);
  this.transparencia = 255;
  this.velocidadeTrnsp = random(3, 6);
  if (this.tipo == 0){
    this.x = random(x - 10 * escala, x + 30 * escala);
    this.y = random(y, y + 30 * escala);
    this.velocidadeRot = random(2, 8);
    this.velocidadeEscl = random(50, 150);
    switch (round(random(-0.49, 2.49))) {
      case 0:
        this.imagem = imagemParticula.get(0, 0, 15, 15);
        break;
      case 1:
        this.imagem = imagemParticula.get(0, 15, 15, 15);
        break;
      case 2:
        this.imagem = imagemParticula.get(15, 0, 30, 30);
        break;
    }
  } else if (this.tipo == 1) {
    this.x = random(x - 3 * escala, x + 3 * escala);
    this.y = random(y, y + 10 * escala);
    this.velocidadeRot = random(1, 4);
    this.cor = color(random(0, 255), random(0, 255), random(0, 255), this.transparencia);
    switch (round(random(-0.49, 1.49))) {
      case 0:
        this.imagem = imagemParticula.get(45, 0, 15, 15);
        break;
      case 1:
        this.imagem = imagemParticula.get(45, 15, 15, 15);
        break;
    }
  } else if (this.tipo == 2){
    this.x = random(x - 3 * escala, x + 3 * escala);
    this.y = random(y, y + 10 * escala);
    this.velocidadeRot = random(1, 4);
    this.ordemEscala = 0; // define quando vai crescer e diminuir
    this.velocidadeEscl = random(50, 150);
    switch (round(random(-0.49, 1.49))) {
      case 0:
        this.imagem = imagemParticula.get(30, 45, 15, 15);
        break;
      case 1:
        this.imagem = imagemParticula.get(45, 45, 15, 15);
        break;
    }
  }
}

Particula.prototype.show = function(){
  push();
  noSmooth();
  if (this.tipo == 0){
    translate(this.x, this.y);
    rotate(this.rotacao);
    scale(escala * (255 - this.transparencia)/this.velocidadeEscl);
    tint(255, this.transparencia);
    imageMode(CENTER);
    image(this.imagem, 0, 0); // desenha a imagem no canvas
  } else if (this.tipo == 1){
    translate(this.x, this.y);
    rotate(this.rotacao);
    scale(escala);
    tint(this.cor);
    imageMode(CENTER);
    image(this.imagem, 0, 0); // desenha a imagem no canvas
  } else if (this.tipo == 2){
    // translate(this.x, this.y);
    translate(this.x, this.y);
    rotate(this.rotacao);
    scale(escala * this.velocidadeEscl/255);
    tint(255, this.transparencia);
    imageMode(CENTER);
    image(this.imagem, 0, 0); // desenha a imagem no canvas
  }
  smooth();
  pop();

  if (this.tipo != 2){
    this.y -= 0.1;
    this.transparencia -= this.velocidadeTrnsp;
    if (this.tipo == 1){
      this.cor.setAlpha(this.transparencia);
    }
  } else {
    if (this.ordemEscala == 0){
      this.velocidadeEscl += 5;
      if (this.velocidadeEscl >= 255){
        this.ordemEscala = 1;
      }
    } else {
      this.velocidadeEscl -= 5;
      if (this.velocidadeEscl < 0){
        this.transparencia = -5;
      }
    }
  }
  this.rotacao += this.velocidadeRot;
  return (this.transparencia < 0);
}
