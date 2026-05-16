import './bootstrap';
import '../css/app.css';
import './admin/create'
import './components/dropdown-filter'
import './components/toggle'

import Chart from 'chart.js/auto';

window.Chart = Chart;

const targetDate = new Date("2026-12-10T00:00:00").getTime();

setInterval(() => {

    const now = new Date().getTime();

    const distance = targetDate - now;

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));

    const hours = Math.floor(
        (distance % (1000 * 60 * 60 * 24)) /
        (1000 * 60 * 60)
    );

    const minutes = Math.floor(
        (distance % (1000 * 60 * 60)) /
        (1000 * 60)
    );

    const dayEl = document.getElementById("days");
    const hourEl = document.getElementById("hours");
    const minuteEl = document.getElementById("minutes");

    if(dayEl) dayEl.innerText = days;
    if(hourEl) hourEl.innerText = hours;
    if(minuteEl) minuteEl.innerText = minutes;

}, 1000);
