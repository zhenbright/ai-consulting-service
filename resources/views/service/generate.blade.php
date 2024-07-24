@php
    SeoHelper::setTitle($title = __('ai-generate'));
    Theme::set('pageTitle', $title);
    Theme::fireEventGlobalAssets();
@endphp

@extends(Theme::getThemeNamespace('layouts.base'))

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="{{asset('themes/apexa/css/app.css')}}" rel="stylesheet" />
<div class="container my-5">
    <div id="message"></div>
    <div class="row" style="display: block;"  id="prompt-view">
        <div class="text-center">
            <h2 id="prompt-title">
                {{$view}}
            </h2>
        </div>  
        <div class="form-group d-flex gap-2 p-0 align-items-center mt-4"  >
            <label for="select-service"> Service: </label>
            <select class="form-select" id="select-service" placeholder="Choose one service">
                <option></option>
                @foreach ($services as $service)
                    <option value="{{$service->id}}">{{$service->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="row text-right  mt-2">
            <div class="col-md-4 form-group d-flex align-items-center gap-2 mt-2">
                <label for="analysis" class="page-count-label" >Analysis : </label>
                <input type="number" class="form-control page-count" id="analysis" />
            </div>
            <div class="col-md-4 form-group d-flex  align-items-center gap-2  mt-2">
                <label for="result" class="page-count-label">Results : </label>
                <input type="number" class="form-control page-count" id="result" />
            </div>
            <div class="col-md-4 form-group d-flex align-items-center gap-2 mt-2">
                <label for="use_case" class="page-count-label">Use Case : </label>
                <input type="number" class="form-control page-count" id="use_case" />
            </div>
        </div>
        <div class="form-group p-0  mt-4">
            <textarea class="form-control" id="prompt-text" rows="5" placeholder="Please input prompt here."></textarea>
        </div>
        <div class="drag-area mt-2" id="dragArea">
            <h4 id="file-upload-title">Drag & Drop to Upload File</h4>
            <button class="btn btn-primary mt-2" id="browseFile">Browse File</button>
            <input type="file" id="fileInput" name="file" hidden>
        </div>
        <div class="mt-3 justify-content-center d-flex p-0">
            <button class="btn btn-two justify-content-center gap-3" id="btn-generate">
                    GENERATE
                    <div class="spinner-border text-white display-none" id="loading-pdf" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
            </button>
        </div>
    </div>
    <div class="row" style="display: none;" id="result-view">
        <div class="d-flex justify-content-end gap-2">
            <a class="btn btn-two btn-no-next"  href="{{asset('3.pdf')}}" download> Download <i class="fa fa-download pl-5"></i></a>
            <button class="btn btn-two btn-no-next" id="btn-back"> <i class="fa fa-arrow-left pr-10"></i> Back </button>
        </div>
        <canvas id="pdfCanvas" class="pdf-view mt-2"></canvas>
    </div>
</div>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script> --}}
<script>
    var services = @json($services);
    var service = null;
    var promptFiles = [];
    $(document).ready(function () {
        var dragArea = $('#dragArea');
        var fileInput = $('#fileInput');
        $('#browseFile').click(function () {
            
            fileInput.click();
        });
        dragArea.click(function(){
            // fileInput.click();
        })
        dragArea.on('dragover', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).addClass('dragover');
        });

        dragArea.on('dragleave', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).removeClass('dragover');
        });

        dragArea.on('drop', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).removeClass('dragover');
            var files = e.originalEvent.dataTransfer.files;
            console.log(e.originalEvent.dataTransfer.files);
            handleFiles(files);
        });

        fileInput.on('change', function () {
            var files = this.files;
            handleFiles(files);
        });

        function handleFiles(files) {
            promptFiles.push(files[0]);
            var formData = new FormData();
            $("#file-upload-title").text(promptFiles.map(pf => pf.name).join(','))
        }

        $(".truncate-1-custom").click(function(){

            $(".service-list").find('li').find('i').removeClass('visible').addClass('invisible');
            $(this).parent().find('i').removeClass('invisible').addClass('visible');
            $("#file-upload-title").text(`Drag & Drop to Upload File`);

            files = null;
            
            $("#prompt-text").val('');
            $("#prompt-title").text($(this).attr('title'));
        })

        $("#btn-generate").click(function() {
            $("#loading-pdf").removeClass('display-none');
            // setTimeout(() => {
            //      //Setting URL of the PDF document that you want to render
            //     const url = "{{asset('3.pdf')}}";
            //     // Rendering the PDF on the canvas
            //     pdfjsLib.getDocument(url).promise.then(pdf => {
            //         // Loading the first page of the PDF
            //         const pageNumber = 1;
            //         return pdf.getPage(pageNumber);
            //     }).then(page => {
                
            //         // Setting the PDF zoom level to 100% by setting scale to 1
            //         const viewport = page.getViewport({ scale: 1 });
                
            //         // Prepare canvas using PDF page dimensions
            //         const canvas = document.getElementById("pdfCanvas");
            //         const context = canvas.getContext("2d");
            //         canvas.height = viewport.height;
            //         canvas.width = viewport.width;
                
            //         // Render PDF page into canvas context
            //         const renderContext = {
            //         canvasContext: context,
            //         viewport: viewport,
            //         };
                
            //         return page.render(renderContext);
            //     });
            //     $("#loading-pdf").addClass('display-none');
            //     $("#prompt-view").css('display', 'none');
            //     $("#result-view").css('display', 'block');
            // }, 4000);
            var promptText = $("#prompt-text").val();
            var formData = new FormData();

            // Append the CSRF token
            formData.append('_token', "{{csrf_token()}}");

            // Append the files
            for (var i = 0; i < promptFiles.length; i++) {
                formData.append('files[]', promptFiles[i]);
            }

            // Append other form data
            formData.append('service', service.name);
            formData.append('promptText', promptText);
            formData.append('pageAnalysis', $("#analysis").val());
            formData.append('pageResult', $("#result").val());
            formData.append('pageUseCase', $("#use_case").val());
            console.log(formData);
            $.ajax({
                type: 'POST',
                url: "{{url('ai-generate')}}",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    $('#message').html('<div class="alert alert-success">' + response.success + '</div>');
                },
                error: function (response) {
                    $('#message').html('<div class="alert alert-danger">' + response.responseJSON.error + '</div>');
                }
            });
        })
        $("#btn-back").click(function() {
            $("#prompt-view").css('display', 'block');
            $("#result-view").css('display', 'none');
        })
        $("#select-service").change(function(){
            let selected_service_id = $(this).val();
            service = services.find(s => s.id == selected_service_id);
            
            $("#analysis").val(service.page_analysis);
            $("#result").val(service.page_result);
            $("#use_case").val(service.page_case_use);
        })
    });

</script>
@endsection
@push('footer')
@endpush

