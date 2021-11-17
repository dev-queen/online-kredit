$(document).ready(function () {
    $('.rambo').click(function(){
        if ($(this).is(':checked')) {
            $('.rambo').not(this).prop('checked', false);
        }
    });
})
//для чекбоксов витрины
//
// $(document).on('click', '.btn.btn-warning.template_sms', function () {
//     var div = $('.connectedSortables');
//     // div.append('<div><input type="text" name="link" placeholder="http://example.com" data-id="url"><span class="delete-link"></span></div>');
//     div.append('<div><input type="text" name="links[]" placeholder="http://example.com" data-id="url"><span class="delete-link"></span></div>');
// });
//
// $(document).on('submit', '#user-form', function (event) {
//     var links = [];
//     $('.alert-links-container.lend_link div').each(function (e) {
//         var l = {
//             'url': $(this).find('input[data-id=url]').val(),
//         }
//         links.push(l);
//     });
//
//     $('#smstemplates-links').val(JSON.stringify(links));
// });
//
// $("#sortable1").sortable({
//     revert: 0,
//     helper: function (e, item) { //create custom helper
//         if (!item.hasClass('selected')) item.addClass('selected');
//         var elements = $('.selected').not('.ui-sortable-placeholder').clone();
//         item.siblings('.selected').addClass('hidden');
//         var helper = $('<ul/>');
//         return helper.append(elements);
//     },
//     start: function (e, ui) {
//         var elements = ui.item.siblings('.selected.hidden').not('.ui-sortable-placeholder');
//         ui.item.data('items', elements);
//     },
//     update: function (e, ui) {
//         ui.item.before(ui.item.data('items'));
//     },
//     stop: function (e, ui) {
//         ui.item.siblings('.selected').removeClass('hidden');
//         $('.selected').removeClass('selected');
//         $(this).find('input:checked').prop('checked', false);
//     }
//
// }).disableSelection();