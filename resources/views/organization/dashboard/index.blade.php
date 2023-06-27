@extends('organization.layouts.app')
@section('title', 'Dashboard')
@section('sub-title', 'Organization Dashboard')
@section('style')
<style>
    .solution_cards_box .solution_card {
    background: #fff;
    box-shadow: 0 2px 4px 0 rgb(136 144 195 / 20%), 0 5px 15px 0 rgb(37 44 97 / 15%);
    position: relative;
    z-index: 1;
    overflow: hidden;
    transition: 0.7s;
}
.card-icon {
    background-color: #fff;
    width: 35px;
    height: 35px;
    border-radius: 10px;
    -webkit-box-shadow: 0 0 5px 2px rgb(0 0 0 / 4%);
    -moz-box-shadow: 0 0 5px 2px rgba(0, 0, 0, 0.04);
    box-shadow: 0 0 5px 2px rgb(0 0 0 / 4%);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 8px;
}
.solution_cards_box .solution_card:before {
    content: "";
    position: absolute;
    background: rgb(85 108 214 / 5%);
    width: 170px;
    height: 400px;
    z-index: -1;
    transform: rotate(57deg);
    right: 0px;
    top: -23px;
    border-radius: 35px;
}
.solution_cards_box .solution_card:hover {
    background: #5dcbc6;
    color: #fff;
    transform: scale(1.1);
    z-index: 9;
}
.solution_cards_box .solution_card:hover strong, .solution_cards_box .solution_card:hover p {
    color: #fff;
}
.hover_color_bubble {
    position: absolute;
    background: rgb(54 81 207 / 10%);
    width: 100rem;
    height: 100rem;
    left: 0;
    right: 0;
    z-index: -1;
    top: 18rem;
    border-radius: 50%;
    transform: rotate(-36deg);
    left: -18rem;
    transition: 0.7s;
}
.blue-color {
    color: #1A3C6E;
    font-family: 'sofia';
    font-weight: 900;
    font-size: 50px;
    line-height: 60px;
}
.dashboard-cards .card {
    border-radius: 16px;
    border: 1px solid #E7EBF4;
    padding: 25px;
    margin-bottom: 30px
}
.card-head{ margin-bottom: 8px;}

p.grey-color.text-capitalize{
    margin-bottom: 0px;
}
.card-icon .fa {
    color: #5dcbc6;
}
@media (max-width: 1899px){
.blue-color { font-size: 45px; line-height: 49px;}
}
@media (max-width:1399px){
    .blue-color { font-size: 35px; line-height: 39px; }
}
</style>
@endsection
@section('content')
<div class="dashboard-col">
  <div class="container-fluid mt-5">
  
    <div class="dashboard-cards">

        <div class="row">

            <div class="col-lg-4 col-md-6 mb-2">

                <a href="#" class="cursor text-decor solution_cards_box">

                    <div class="card solution_card">
                        <div class="hover_color_bubble"></div>

                        <div class="card-head d-flex align-items-center mb-3 mb-2">

                            <div class="card-icon me-2">

                                <i class="fa fa-check-square-o" aria-hidden="true"></i>

                            </div>

                            <p class="grey-color text-capitalize mb-0">Paid Consultation</p>

                        </div>

                         <!-- <strong class="blue-color total"></strong> -->

                    </div>

                </a>

            </div>

            <div class="col-lg-4 col-md-6 mb-2">

                <a href="#" class="cursor text-decor solution_cards_box">

                    <div class="card solution_card">
                        <div class="hover_color_bubble"></div>
                        <div class="card-head d-flex align-items-center mb-3 mb-2">

                            <div class="card-icon me-2">

                                <i class="fa fa-ban" aria-hidden="true"></i>

                            </div>

                            <p class="grey-color text-capitalize mb-0">Declined Consultation</p>

                        </div>

                        <!-- <strong class="blue-color total"></strong> -->

                    </div>

                </a>

            </div>

            <div class="col-lg-4 col-md-6 mb-2">

                <a href="#" class="cursor text-decor solution_cards_box">

                    <div class="card solution_card">
                        <div class="hover_color_bubble"></div>

                        <div class="card-head d-flex align-items-center mb-3 mb-2">

                            <div class="card-icon me-2">

                                <i class="fa fa-undo" aria-hidden="true"></i>

                            </div>

                            <p class="grey-color text-capitalize mb-0">Pending Consultation</p>

                        </div>

                        <!-- <strong class="blue-color total"></strong> -->

                    </div>

                </a>

            </div>

            <div class="col-lg-4 col-md-6 mb-2">

                <a href="#" class="cursor text-decor solution_cards_box">

                    <div class="card solution_card">
                        <div class="hover_color_bubble"></div>
                        <div class="card-head d-flex align-items-center mb-3 mb-2">

                            <div class="card-icon me-2">

                                <i class="fa fa-money" aria-hidden="true"></i>

                            </div>

                            <p class="grey-color text-capitalize mb-0">Total Paid Consultation Payment</p>

                        </div>

                        <!-- <strong class="blue-color total">$ </strong> -->

                    </div>

                </a>

            </div>
            <div class="col-lg-4 col-md-6 mb-2">

                <a href="#" class="cursor text-decor solution_cards_box">

                    <div class="card solution_card">
                        <div class="hover_color_bubble"></div>
                        <div class="card-head d-flex align-items-center mb-3 mb-2">

                            <div class="card-icon me-2">

                                <i class="fa fa-money" aria-hidden="true"></i>

                            </div>

                            <p class="grey-color text-capitalize mb-0">Daily Paid Consultation Payment</p>

                        </div>

                        <!-- <strong class="blue-color total"> </strong> -->

                    </div>

                </a>

            </div>
            
            <div class="col-lg-4 col-md-6 mb-2">

                <a href="#" class="cursor text-decor solution_cards_box">

                    <div class="card solution_card">
                        <div class="hover_color_bubble"></div>

                        <div class="card-head d-flex align-items-center mb-3 mb-2">

                            <div class="card-icon me-2">

                                <i class="fa fa-check-square-o" aria-hidden="true"></i>

                            </div>

                            <p class="grey-color text-capitalize mb-0">Daily Paid Consultation</p>

                        </div>

                         <!-- <strong class="blue-color total"></strong> -->

                    </div>

                </a>

            </div>
        </div>

    </div>

  </div>
</div>
@endsection

@section('js')
<script>
  $(function() {
    $("body").on("change", ".status", function() {
      $(this).closest('form').submit();
    });

  });
</script>
@endsection
