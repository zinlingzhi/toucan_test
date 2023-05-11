$(document).ready(function() {
	$("#searchBtn").click(function() {
		var name = $("#name").val();
		$.ajax({
			url: "search.php",
			type: "POST",
			data: { name: name },
			success: function(data) {
				$("#results").html(data);
			},
			error: function() {
				alert("An error occurred while processing your request.");
			}
		});
	});
});