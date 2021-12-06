
<?php use Illuminate\Support\Facades\DB; ?>
<div class="col-lg-2 col-md-2 col-12 left-area">
    <div class="left-area-inner position-relative">
       <?php  $age_data = DB::select('select * from age_group ORDER BY ID ASC LIMIT 3'); ?>
        
        @foreach($age_data as $ageCat)        
            
            <div class="person-time d-flex 
                @if($ageCatUrl == $ageCat->slug)
                    person-time-active
                @endif
                " id="age_cat_{{$ageCat->id}}">
                <a href="{{url($curruntpage.'/'.$ageCat->slug)}}">
                    <img alt="" src="{{ url($ageCat->icon_image)}}" class="img-fluid" data-value="Children">
                    <span>{{$ageCat->title}}</span>
                </a>
            </div>
            
       
        @endforeach

       <!--- <div class="person-time d-flex">
            <img alt="" src="images/teen.jpg" class="img-fluid">
            <span>Teen</span>
        </div>--->
        
    </div>
</div>
