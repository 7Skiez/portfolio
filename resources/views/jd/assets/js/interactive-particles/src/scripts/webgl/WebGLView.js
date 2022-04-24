import 'three';
import { TweenLite } from 'gsap/TweenMax';

import InteractiveControls from './controls/InteractiveControls';
import Particles from './particles/Particles';

const glslify = require('glslify');

export default class WebGLView {

	constructor(app) {
		this.app = app;

		this.samples = [
			'img/sample-10.png',
		];

		this.initThree();
		this.initParticles();
		this.initControls();

		const rnd = ~~(Math.random() * this.samples.length);
		this.goto(rnd);
	}

	initThree() {
		// scene
		this.scene = new THREE.Scene();

		// camera
		this.camera = new THREE.PerspectiveCamera(50, window.innerWidth / window.innerHeight, 1, 10000);
		this.camera.position.z = 300;

		// renderer
        this.renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });

        // clock
		this.clock = new THREE.Clock(true);
	}

	initControls() {
		this.interactive = new InteractiveControls(this.camera, this.renderer.domElement);
	}

	initParticles() {
		this.particles = new Particles(this);
		this.scene.add(this.particles.container);
	}

	// ---------------------------------------------------------------------------------------------
	// PUBLIC
	// ---------------------------------------------------------------------------------------------

	update() {
		const delta = this.clock.getDelta();

		if (this.particles) this.particles.update(delta);
	}

	draw() {
		this.renderer.render(this.scene, this.camera);
	}


	goto(index) {
		// init next
		if (this.currSample == null) this.particles.init(this.samples[index]);
		// hide curr then init next
		else {
			this.particles.hide(true).then(() => {
				this.particles.init(this.samples[index]);
			});
		}

		this.currSample = index;
	}

	next() {
		if (this.currSample < this.samples.length - 1) this.goto(this.currSample + 1);
		else this.goto(0);
	}

	// ---------------------------------------------------------------------------------------------
	// EVENT HANDLERS
	// ---------------------------------------------------------------------------------------------

	resize() {

		if (!this.renderer) return;

		const setSize = (imageWidth, imageHeight) => {

			const aspect = ((window.innerWidth / window.innerHeight) < 1 ? (window.innerWidth / window.innerHeight) * 4 : 4)
				
			this.camera.aspect = imageWidth / imageHeight;
			this.camera.updateProjectionMatrix();
	
			this.fovHeight = 2 * Math.tan((this.camera.fov * Math.PI) / 180 / 2) * this.camera.position.z;
	
			this.renderer.setSize(imageWidth*aspect, imageHeight*aspect);
	
			if (this.interactive) this.interactive.resize();
			if (this.particles) this.particles.resize();

		}
		
		setSize()
		window.onresize = setSize
		let img = new Image();
		img.src = this.samples[0];
		img.onload = function(){
			setSize(img.width, img.height)
		}

	}

}
