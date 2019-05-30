"use strict";
var browserName = navigator.appName;
var browserVersion = parseInt(navigator.appVersion);

if (browserVersion <= 4) {
  alert("You are using older browser.  This site may not be visible properly. please use latest Google Chrome or Mozilla Firefox or upgrade your browser.");
}

$(document).ready(function () {
  particlesJS("particles-js", {
    particles: {
      number: { value: 90, density: { enable: false, value_area: 400 } },
      color: { value: "#5f2400" },
      shape: {
        type: "circle",
        stroke: { width: 0, color: "#000000" },
        polygon: { nb_sides: 5 },
        image: { src: "img/github.svg", width: 100, height: 100 }
      },
      opacity: {
        value: 1,
        random: true,
        anim: { enable: false, speed: 1, opacity_min: 0.1, sync: false }
      },
      size: {
        value: 6,
        random: true,
        anim: { enable: false, speed: 40, size_min: 0.1, sync: false }
      },
      line_linked: {
        enable: true,
        distance: 200,
        color: "#5f2400",
        opacity: 0.8,
        width: 1
      },
      move: {
        enable: true,
        speed: 2,
        direction: "top-left",
        random: false,
        straight: false,
        out_mode: "out",
        bounce: false,
        attract: { enable: false, rotateX: 600, rotateY: 1200 }
      }
    },
    interactivity: {
      detect_on: "canvas",
      events: {
        onhover: { enable: true, mode: "grab" },
        onclick: { enable: false, mode: "push" },
        resize: true
      },
      modes: {
        grab: { distance: 250, line_linked: { opacity: 1 } },
        bubble: { distance: 400, size: 40, duration: 2, opacity: 8, speed: 3 },
        repulse: { distance: 200, duration: 0.4 },
        push: { particles_nb: 4 },
        remove: { particles_nb: 2 }
      }
    },
    retina_detect: true
  });
});