import { gsap } from "gsap";
// import { Flip } from "gsap/Flip";
import { ScrollTrigger } from "gsap/ScrollTrigger";
// import { Observer } from "gsap/Observer";
// import { ScrollToPlugin } from "gsap/ScrollToPlugin";
// import { Draggable } from "gsap/Draggable";
// import { EaselPlugin } from "gsap/EaselPlugin";
// import { MotionPathPlugin } from "gsap/MotionPathPlugin";
// import { PixiPlugin } from "gsap/PixiPlugin";
// import { TextPlugin } from "gsap/TextPlugin";
import Lenis from "@studio-freight/lenis";

gsap.registerPlugin(
	// 	Flip,
	ScrollTrigger
	// 	Observer,
	// 	ScrollToPlugin,
	// 	Draggable,
	// 	EaselPlugin,
	// 	MotionPathPlugin,
	// 	PixiPlugin,
	// 	TextPlugin
);

window.gsap = gsap;
// window.Power0 = Power0;
// window.Power1 = Power1;
// window.Power3 = Power3;
// window.Flip = Flip;
window.ScrollTrigger = ScrollTrigger;
// window.Observer = Observer;
// window.ScrollToPlugin = ScrollToPlugin;
// window.Draggable = Draggable;
// window.EaselPlugin = EaselPlugin;
// window.MotionPathPlugin = MotionPathPlugin;
// window.PixiPlugin = PixiPlugin;
// window.TextPlugin = TextPlugin;
window.Lenis = Lenis;
