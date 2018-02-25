/**
 *  Document   : table_data.js
 *  Author     : redstar
 *  Description: advance table page script
 *
 **/

document.querySelector('#p1').addEventListener('mdl-componentupgraded', function() {
	this.MaterialProgress.setProgress(44);
});

document.querySelector('#p3').addEventListener('mdl-componentupgraded', function() {
	this.MaterialProgress.setProgress(33);
	this.MaterialProgress.setBuffer(87);
});