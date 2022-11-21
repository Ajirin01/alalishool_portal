@for ($i = 1; $i <= 5; $i++)
    <div class="card card-default">
        <div class="card-header">
        <h3 class="card-title">{{strtoupper($noun[0]).substr($noun, 1, strlen($noun))}} {{$i}}</h3>

        <div class="card-tools">
            <button type="button" id="collapse-{{$noun}}-area{{$i}}" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="card-body">
                    <input type="text" name="" id="text{{$i}}add{{$noun}}" class="form-control" placeholder="please enter {{$noun}}">
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
@endfor

<button class="btn btn-primary" onclick="add({{json_encode($noun)}})">Submit</button>

<script>
    $(document).ready(function(){
        for(let i= 1; i <= 5; i++){
            $("#collapse-"+ {{Js::from($noun)}} +"-area"+i).click()
        }
        
    })

    var data = []

    function add(noun){
        let key = {{Js::from($key)}}
        console.log(key)
        loopTextFieldsToData(noun, key)
        let component_url = "/components/general-table-body-row-3-col"

        addRecords(noun, component_url, data, key)
    }
</script>