$(document).ready(function() {

$.url = function() {
  return $('base').attr('href');
}


var nom = $("#InputAddNom").on('change',function(){
	$("#InputAddLogin").val($("#InputAddPrenom").val()+"."+$(this).val());
	});
var prenom =$("#InputAddPrenom").on('change',function(){
	$("#InputAddLogin").val($(this).val()+"."+$("#InputAddNom").val());
	});



$("#InputAddLogin").focus(function(){

	console.log(prenom);
	console.log(nom);

	


});

$('.datepicker').datepicker();

$('.btn_rep_oui').on("click", function(){
	$('#ParticipationEvenementsId').val($(this).attr('data-course'));
});


$('.edit_btn_rep_oui').on("click", function(){
	console.log("click click");

	
	$('#ParticipationEvenementsId').val($(this).attr('data-course'));
});

$('#submit_button').on("click", function(){

	var event_id=$(this).attr('data-course');
		var button=$(this).parent().parent().parent().find('button');


		//$(button).button('loading');
		var cate_id=$('#ParticipationCategoriesId').val();
		var course_id=$('#ParticipationCoursesId').val();
		var remarque=$('#ParticipationRemarques').val();
		var covoit=$('#ParticipationCovoiturage').val();
		var event_id=$('#ParticipationEvenementsId').val();


		//if(id_participation.length==0){
			$.getJSON($.url()+"participations/insertParticipation", 
				{ evenements_id: event_id, categories_id: cate_id, courses_id: course_id, covoiturage : covoit, remarques:remarque, rep: "oui" } )
			.done(function(json) {
			  console.log({ evenements_id: event_id, categories_id: cate_id, courses_id: course_id, covoiturage : covoit, remarques:remarque, rep: "oui" });
				console.log("done");
				//$('#button_part_'+event_id).button('oui');
				//$('#myModal').modal('hide');
			})
			.fail(function( jqxhr, textStatus, error ) {
				var err = textStatus + ', ' + error;
				console.log( "Request Failed: " + err);
			});

	

});

$('.btn_ajax_user').on("click", function(){

var items = [['Admin','Passer en utilisateur', '1'], ['Utilisateur', 'Passer en admin', '0'], ['Activé','Désactiver', '3'],['Désactivé','Activer', '2']];
var a=$(this);
var id=$(this).attr('data-user');
var action=$(this).attr('data-action');
$('#btn-upgrade-'+id+'-'+action).button('loading');
$.getJSON($.url()+"utilisateurs/upgrade/"+id+"/"+action )
			.done(function(json) {
				
				if(json.etat=="1"){
					$('#btn-upgrade-'+id+'-'+action).button('reset');
				$(a).html($(items)[action][1]);
				$('#btn-upgrade-'+id+'-'+action).html($(items)[action][0]+' <span class="caret"></span>');

				}else{
					$('#btn-upgrade-'+id+'-'+action).button('reset');



				}
						$('#btn-upgrade-'+id+'-'+action).popover({
        placement: 'top',
        animation: 'true',
        content: json.mess,
        delay: { show: 100, hide: 100 }
    });

						$('#btn-upgrade-'+id+'-'+action).popover('toggle');
				
			})
			.fail(function(jqxhr, textStatus, error ) {
				var err = textStatus + ', ' + error;
				console.log( "Request Failed: " + err);
			});
});







$('.btn_rep_nsp').on("click", function(){
		var course_id=$(this).attr('data-course');
		var button=$(this).parent().parent().parent().find('button');


		$(button).button('loading');
		
		//if(id_participation.length==0){
			$.getJSON( $.url()+"/participations/insertParticipation",
			 { evenements_id: course_id,categories_id:'',courses_id:'',covoiturage:'',remarques:'', rep: "nsp" } )
			.done(function(json) {
				$(button).button('nsp');
				console.log(json);
			})
			.fail(function( jqxhr, textStatus, error ) {
				var err = textStatus + ', ' + error;
				console.log( "Request Failed: " + err);
			});
		/*}else{
			$.getJSON( "participations/editParticipation", { id:id_participation, evenements_id: course_id, rep: "nsp" } )
			.done(function( json ) {
				$(button).button('nsp');
			})
			.fail(function( jqxhr, textStatus, error ) {
				var err = textStatus + ', ' + error;
				console.log( "Request Failed: " + err);
			});




		} */

		//console.log($(this).parent().parent().parent().find('button'));


	//console.log($(this).parent().parent().parent().find('button'));
	



});


$('.btn_rep_non').on("click", function(){

	
			var course_id=$(this).attr('data-course');
		var button=$(this).parent().parent().parent().find('button');
		$(button).button('loading');
		//console.log($(this).parent().parent().parent().find('button'));
	$.getJSON( $.url()+"/participations/insertParticipation", { evenements_id: course_id, rep: "non" } )
.done(function( json ) {
 $(button).button('non');
})
.fail(function( jqxhr, textStatus, error ) {
  var err = textStatus + ', ' + error;
  console.log( "Request Failed: " + err);
});
});




$('.btn_rep').on("click", function(){
		var course_id=$(this).attr('data-course');
		var button=$(this).parent().parent().parent().find('button');
		$(button).button('loading');
		//console.log($(this).parent().parent().parent().find('button'));
	$.getJSON( $.url()+"/participations/insertParticipation", { evenements_id: course_id, rep: "oui" } )
.done(function( json ) {
 $(button).button('oui');
})
.fail(function( jqxhr, textStatus, error ) {
  var err = textStatus + ', ' + error;
  console.log( "Request Failed: " + err);
});


});






});