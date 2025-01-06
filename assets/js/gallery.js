import noUiSlider from 'nouislider';
import 'nouislider/dist/nouislider.min.css'
import '../styles/gallery.css'



const rangSlider = document.getElementById('range-slider');
const input0 = document.getElementById('input-1');
const input1 = document.getElementById('input-2');
const inputs = [input0,input1];

noUiSlider.create(rangSlider, {
    start: [0, 10000],
    connect: true,
    step: 1,
    range: {
        'min': 0,
        'max': 10000
    }
});

rangSlider.noUiSlider.on('update', function (values, handle){
    inputs[handle].value = Math.round(values[handle]);
});


const setRangeSlider = (i, value) => {
    let arr = [null, null];
    arr[i] = value;
    rangSlider.noUiSlider.set(arr);
}
inputs.forEach((el,index) => {
    el.addEventListener('change', (e) => {
        setRangeSlider(index, e.currentTarget.value);
    });
});