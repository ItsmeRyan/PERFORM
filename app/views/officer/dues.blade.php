
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
{{ HTML::style('css/officer.css') }}


@include('./admin/charts')
<?php

if($user->programs()->count() !=0){
    $aggrkpi = array();
    $aggrkpi = aggtarget($user);

    $aggrkpi1 = array();
    $aggrkpi1 = aggvalues($user);
}
?>
<div class="wrap">
                                            {{--Header--}}
    <div class="header">
        <div class="header-text">
            Return Due
        </div>

        <div class="header-nav">
            <div class="header-admin-role">You are Logged in as:<br/>
                <div class="header-admin-role-text">
                    {{$user->firstName}} {{$user->lastName}}<br/>
                    {{AdminArea::getLevel()}}
                </div>
            </div>
            <a href = "{{ URL::to('logout') }}" class="header-logout"> Log out </a>
        </div>
    </div>




                                                {{--Main Body--}}

    <div class="contents">
        <div class="contents-three-buttons">
            {{ HTML::image('img/left1.png','Back',  array('class' => 'back_btn1', 'onclick' => 'Back()')) }}
            <a href=" {{ URL::to('admin') }}"  class="tab_login_1 navbut">
                {{ HTML::image('img/home1.png','Home',  array('class' => 'back_btn1')) }}
            </a>
            <a href="#" class="tab_login_1 navbut" id="info">
                {{ HTML::image('img/help.png','Home',  array('class' => 'back_btn1')) }}
            </a>

        </div>

     

        <div class="contents-main-body">
            <div class="dots-repeat">
                <span class="dots">
                    <?php
                    for($i=0; $i<100; $i++)
                        echo ".";
                    ?>
                </span>
            </div>

           
            


            <div class="kpis1">
                <?php $projects = array(); $projects = OfficerArea::getProjects(); ?>

                   

                    <div class="officer-projects">
                    
                        <?php $prid = array(); $prid = OfficerArea::getDues('project') ; $result = array_unique($prid);
                        $dues = array(); $dues = OfficerArea::getDues("returns") ; 
                        ?>
                        <span class="return-due-text"> Return Due for:- </span>

                        <div class="return-due-projects">
                           @foreach($result as $key => $value)
                             <?php $pr = Project::where('id', '=', $value)->first(); ?>
                             <div class="return-project-box">
                                {{ $pr->name }}
                             </div>

                             <div class="submit-project-due">
                              <a href="dues/kpis/{{$value}}" class="submit-now" id="{{$value}}">Submit</a>
                             </div>
                           @endforeach
                        </div>

                       

                        
                    </div>




                <div id="dialog" title="Welcome to the Monitoring and Evaluation Dashboard">
                    <p>
                        The monitoring and evaluation software is underpinned by European Commission guidelines and UK government HM Treasury best practices in monitoring and evaluation.  It has been developed to be compatible with PRINCE2 methods, it also draws upon over 30 years of Tech4i2’s practical experience in undertaking monitoring and evaluation studies for all tiers of government throughout the world.
                        A key advantage of the software is the simplicity for users in using the dashboard to examine spending and outputs from the strategic level to the details concerning hundreds of individual projects in <i>‘three-clicks’</i>.

                    </p>
                </div>



            </div>





        <div class="dots-repeat12">
          <span class="dots2">
                 <?php
              for($i=0; $i<100; $i++)
                  echo ".";
              ?>
          </span>
        </div>
    </div>


    {{--Footer--}}

    <div class="footer">



    </div>
 </div>
</div>

<script>

    var dots = 0;
    var dots1 = 0;

    $(document).ready(function()
    {
        //setInterval (type, 150);
        //setInterval (type1, 150);
    });

    function type()
    {
        if(dots < 100)
        {
            $('.dots1').append('.');
            dots++;
        }
        else
        {
            $('.dots1').html('');
            dots = 0;
        }
    }

    function type1()
    {
        if(dots1 < 100)
        {
            $('.dots2').append('.');
            dots1++;
        }
        else
        {
            $('.dots2').html('');
            dots1 = 0;
        }
    }

    $(function() {
        $( "#dialog" ).dialog({
            autoOpen: false,
            show: {
                effect: "blind",
                duration: 1000
            },
            hide: {
                effect: "explode",
                duration: 1000
            }
        });

        $( "#info" ).click(function() {
            $( "#dialog" ).dialog( "open" );
        });
    });

    function Back(){
        window.history.back()
    }

    function Forward(){
        window.history.forward()
    }

    



</script>