$(document).ready(function() {
    $("#other_info").on('keyup', function() {
        var words = this.value.match(/\S+/g).length;

        if (words > 100) {
            // Split the string on first 200 words and rejoin on spaces
            var trimmed = $(this).val().split(/\s+/, 100).join(" ");
            // Add a space at the end to make sure more typing creates new words
            $(this).val(trimmed + " ");
        }
        else {
            $('#display_count').text(words);
            $('#word_left').text(100-words);
        }
    });
});