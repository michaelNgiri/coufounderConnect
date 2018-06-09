$('.dropdown-mul-1').dropdown({
    // read only
    readOnly: false,

    // the maximum number of options allowed to be selected
    limitCount: Infinity,

    // search field
    input: '<input type="text" maxLength="20" placeholder="Search">',

    // dynamic data here
    data: [],

    multipleMode: 'label',

    // is search able?
    searchable: true,

    // when there's no result
    searchNoData: '<li style="color:#ddd">No Results</li>',

    // callback
    choice: function () {}

});

function test() {
    alert('i am here');
}


    $(document).ready(function() {
        $('.multiselect').multiselect({
            buttonContainer: '<span class="dropdown" />'
        });
    });