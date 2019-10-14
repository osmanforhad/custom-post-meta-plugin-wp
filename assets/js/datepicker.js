/**
 * start jQuery
 */
;(function($){

    /**
     * start function
     */
    $(document).ready(function(){

        /**
         * ckick event
         */
        $('.cbxDatepicker-warp').on('click','cbx_Datepicker_btn',function(e){
            e.preventDefault();

            var $this = $(this); //which has been clicked
        var $parent = $this.closest('.cbxDatepicker-warp'); //parent wrapper of clicked item

        });//end click event

        /**
         * for datepicker
         */
        $('#cbx_metabox_date').datepicker(
            {
                changeMonth: true,//for month option
                changeYear: true//for year option
            }
        );//end datepicker

    });//end function

})(jQuery);//end jQuery