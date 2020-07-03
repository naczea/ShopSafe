* {
  margin: 0;
  padding: 0;
  box-sizing: border-box; }

body {
  background: #fff;
  overflow-x: hidden;
  font-family: 'Baloo Chettan 2', sans-serif; }

a {
  text-decoration: none; }

ul {
  list-style-type: none; }

header {
  background-image: url(../../img/loginv4.svg);
  background-repeat: no-repeat;
  background-position: 50% 50%;
  background-size: cover;
  width: 100%;
  height: 100vh; }

.nets {
  font-size: 18px;
  color: white;
  background: #94b0b7;
  border-top-right-radius: 10px;
  border-bottom-right-radius: 10px;
  position: absolute;
  top: 40%;
  z-index: 100;
  box-shadow: 0 8px 32px rgba(74, 112, 122, 0.8);
  padding: 5px 0px; }
  .nets div i {
    margin: 8px 10px; }

.navbar {
  width: 100%;
  height: 55px;
  top: 0;
  left: 0;
  display: flex;
  align-items: center;
  justify-content: center; }
  .navbar .navbar__list {
    display: flex; }
    .navbar .navbar__list li a {
      margin: 0px 40px;
      color: #4a707a;
      font-size: 15px; }

.conthead {
  display: flex;
  flex-direction: column;
  justify-content: start;
  align-items: center;
  height: 90vh;
  width: 100%; }
  .conthead .conthead__logo {
    margin-top: 80px; }
    .conthead .conthead__logo img {
      width: 175px;
      height: 120px;
      animation: ease-in animat 0.5s; }
  .conthead .conthead__author {
    text-align: center;
    color: #4a707a;
    font-size: 22px;
    font-weight: 500;
    margin-bottom: 60px;
    padding: 0; }
  .conthead .conthead__machine {
    font-family: Consolas;
    font-weight: 800;
    margin-bottom: 45px; }
    .conthead .conthead__machine .sys {
      color: #b79abc; }
    .conthead .conthead__machine .named {
      color: #94b0b7; }
    .conthead .conthead__machine .sign {
      color: #6dabbb; }
    .conthead .conthead__machine .word {
      color: #5d9e8c; }
    .conthead .conthead__machine .div-machine {
      margin-top: 5px; }

@keyframes animat {
  0% {
    transform: scale(0); }
  100% {
    transform: scale(1); } }
.ghost {
  border: 1.1px solid;
  border-radius: 20px;
  padding: 8px 25px;
  text-align: center; }

.conthead__button {
  border-color: #4a707a;
  color: #4a707a;
  font-size: 12.5px;
  font-weight: 500;
  box-shadow: 0 8px 32px rgba(74, 112, 122, 0.46); }

.datacv__button {
  border-color: white;
  color: white;
  font-size: 20px;
  font-weight: 500;
  margin-left: 20px;
  box-shadow: 0 8px 32px rgba(74, 112, 122, 0.8); }

.aboutme {
  width: 75%;
  height: 82vh;
  margin: auto;
  margin-top: 70px;
  margin-bottom: 90px;
  background-color: #a5bec4;
  background-image: url(../../../img/naczea_design.png);
  background-repeat: no-repeat;
  background-size: 92vh 82vh;
  background-position: 100% 100%;
  display: flex;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.8); }

.datap {
  margin: 0px 90px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center; }
  .datap .datap__title {
    margin-top: 50px;
    margin-bottom: 10px;
    align-self: center;
    color: white;
    font-weight: bold;
    font-size: 20px; }
  .datap .datap__items {
    margin-left: 20px;
    width: 300px;
    color: #4a707a;
    line-height: 28px;
    font-size: 17.5px;
    font-weight: 500; }
  .datap .datap__photo {
    margin-top: 20px;
    width: 210px;
    height: 340px;
    align-self: center; }
    .datap .datap__photo img {
      width: 210px;
      height: 340px; }

.datacv {
  display: flex;
  flex-direction: column;
  margin-left: 125px;
  margin-right: 70px; }
  .datacv .datacv__title {
    margin-top: 70px;
    margin-bottom: 20px;
    align-self: center;
    color: white;
    font-weight: bold;
    font-size: 20px; }
  .datacv .datacv__p {
    margin-top: 20px;
    align-self: center;
    color: white;
    font-size: 15px;
    text-align: justify;
    line-height: 35px;
    font-weight: normal; }
  .datacv .datacv_buttons {
    margin-top: 50px;
    display: flex;
    justify-content: center;
    align-items: center; }

.services {
  width: 100%;
  height: 100vh;
  margin-top: 50px;
  margin-bottom: 100px; }
  .services .services__port {
    width: 100%;
    height: 250px;
    background-color: #7697a0; }
    .services .services__port .port__bg {
      width: 80%;
      height: 250px;
      margin: auto;
      background-image: url(../../../img/circuit.jpg);
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-position: 50%;
      display: flex;
      justify-content: center;
      align-items: center; }
      .services .services__port .port__bg .port__title {
        color: white;
        font-size: 40px;
        letter-spacing: 16.5px; }
  .services .services__cont {
    width: 90%;
    margin: auto;
    margin-top: 50px;
    margin-bottom: 50px;
    display: flex;
    justify-content: space-around; }
    .services .services__cont .cont {
      width: 28%;
      background-color: #a5bec4;
      margin-bottom: 30px;
      border-radius: 10px;
      padding: 35px 30px 40px 30px; }
      .services .services__cont .cont i {
        font-size: 30px;
        color: white;
        background-color: #4a707a;
        display: inline-block;
        width: 60px;
        height: 60px;
        text-align: center;
        padding-top: 15px;
        border-radius: 50%;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5); }
      .services .services__cont .cont h2 {
        color: white;
        margin-top: 20px;
        margin-left: 10px; }
      .services .services__cont .cont ul {
        height: 65%;
        display: flex;
        flex-direction: column;
        justify-content: space-between; }
        .services .services__cont .cont ul li {
          color: #4a707a;
          margin-top: 15px;
          line-height: 20px;
          margin-left: 20px;
          margin-right: 20px; }
    .services .services__cont .cont:hover {
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5); }

.contact {
  margin-top: 500px; }

/*# sourceMappingURL=style.c.map */
