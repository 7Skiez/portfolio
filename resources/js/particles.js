import * as THREE from 'three'

import ready from 'domready';

import App from './interactive-particles/src/scripts/App';

ready(() => {
	window.app = new App();
	window.app.init();
});