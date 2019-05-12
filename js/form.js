function hideOthers() {
    $("#qualification_text").hide();
    $("#ethnicity_text").hide();
}

function showOthers() {
    $("#qualification_text").show();
    $("#ethnicity_text").show();
}


$(document).ready(hideOthers);

$(document).ready(
    function() {
        $("select#ethnicity").change(
            function() {
                var ethnicity = $(this).children("option:selected").val();
                if (ethnicity == "Others") {
                    $("#ethnicity_text").show();
                } else {
                    $("#ethnicity_text").hide();
                }
            }
        );

        $("select#qualification").change(
            function() {
                var qualification = $(this).children("option:selected").val();
                if (qualification == "Others") {
                    $("#qualification_text").show();
                } else {
                    $("#qualification_text").hide();
                }
            }
        );
    }
)