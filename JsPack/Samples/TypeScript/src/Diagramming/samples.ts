document.addEventListener("DOMContentLoaded", function () {

	let e = document.createElement('div');
	e.innerHTML = '<hr />' +
		'<h1>About JsDiagram</h1>' +
		'<p>JsDiagram is fully interactive flow diagramming control for the web. The diagram tool is written 100% in JavaScript and uses the HTML5 Canvas element for drawing. The package includes miscellaneous UI controls such as Overview providing scaled down view of the drawing, and NodeListView displaying a palette of diagram elements.</p>' +
		'<h2>Features</h2>' +
		'<ul>' +
		'<li>Interactive zooming, scrolling, and panning</li>' +
		'<li>Hundreds of built-in shapes and the ability to define custom shapes</li>' +
		'<li>Table nodes with collapsible rows and spanning cells</li>' +
		'<li>Many ready-to-use layouts, including tree, layered, fractal, and more</li>' +
		'<li>Automatic link routing</li>' +
		'<li>Lane grid</li>' +
		'<li>Hierarchical grouping of diagram elements</li>' +
		'<li>Undo and redo support</li>' +
		'<li>Styles and themes</li>' +
		'<li>Node effects</li>' +
		'<li>Overview, NodeListView, Zoom controls</li>' +
		'</ul>';

	if (document.getElementById('infoTab'))
		document.getElementById('infoTab').appendChild(e);
});