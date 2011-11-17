var FileUploader = (function($) {
    return {
        uploadImage : function() {
            $.ajaxFileUpload({
                url				: '/upload/saveUpload',
                secureuri		: false,
                fileElementId	: 'image',
                dataType		: 'json',
                success			: function (data, status){
                    alert('success');
                },
                error: function (data, status, e){}
            }, true);
        }

    }
})(jQuery);   