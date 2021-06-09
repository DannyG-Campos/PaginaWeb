let arraySrc = [
    './img/img1.jpg',
    './img/img2.jpg',
    './img/img3.jpg',
    './img/img4.jpg'
];

const img = document.getElementById('img');
let i = 0;

const showImg = () => {
    img.src = arraySrc[i];
    i = (i < arraySrc.length-1) ? i+1:0;
}

const interval = () => {
    setInterval(showImg,1000);
}