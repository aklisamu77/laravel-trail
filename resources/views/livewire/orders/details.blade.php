<style>
  


.mt-100 {
    margin-top: 150px
}

.model-cont .modal-content {
    border-radius: 0.7rem
}

@media(width:1024px) {
   .model-cont  .modal-dialog {
        max-width: 700px
    }
}

.model-cont .modal-title {
    text-align: center;
    font-size: 3vh;
    font-weight: bold
}

.model-cont h4 {
    margin-left: auto
}

.model-cont .modal-header {
    border-bottom: none;
    text-align: center;
    padding-bottom: 0
}

.model-cont h6 {
    color: rgb(2, 55, 230);
    margin-top: 2vh;
    margin-bottom: 0;
    font-size: 2vh
}

.model-cont .modal-body {
    padding: 2vh
}

.model-cont .modal-footer {
    border-top: none;
    justify-content: center;
    padding-top: 0
}

.model-cont .row {
    border-bottom: 1px solid rgba(0, 0, 0, .2);
    padding: 2vh 0 2vh 0;
    justify-content: space-between;
    flex-wrap: unset;
    margin: 0
}

.model-cont ul {
    padding: 0;
    display: flex;
    flex-direction: column;
    justify-content: space-around
}

.model-cont ul li {
    font-size: 2vh;
    font-weight: bold;
    line-height: 4vh
}

.model-cont .left {
    float: left;
    font-weight: normal;
    color: rgb(126, 123, 123)
}

.model-cont .right {
    float: right;
    text-align: right
}

.model-cont .col {
    padding-left: 0
}

@media(min-width:1025px) {
    .model-cont img {
        width: 70%
    }
}

.model-cont .btn {
    background-color: rgb(2, 55, 230);
    border-color: rgb(2, 55, 230);
    color: white;
    width: 90%;
    padding: 2vh;
    margin-top: 0;
    border-radius: 0.7rem;
    box-shadow: none
}

.model-cont .openmodal {
    background-color: white;
    color: black;
    width: 30vw
}

:-moz-any-link:focus {
    outline: none
}

.model-cont button:active {
    outline: none
}

.model-cont button:focus {
    outline: none
}

.model-cont .btn:focus {
    box-shadow: none
}
</style>
<div class="container model-cont">
    <!-- Button to Open the Modal -->
    <button type="button" class="btn openmodal" data-toggle="modal" data-target="#modal1"> Click here </button>
        <!-- The Modal -->
    <div class="modal fade" id="modal1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Adidas Yeezy Boost 350 V2<br> Limited Edition</h4> <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div> <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <h6>Item Details</h6>
                        <div class="row">
                            <div class="col"> <img class="img-fluid" src="https://i.imgur.com/iItpzRh.jpg"> </div>
                            <div class="col-xs-6" style="padding-top: 2vh;">
                                <ul type="none">
                                    <li>Size: 11</li>
                                    <li>Color: Desert Sage</li>
                                </ul>
                            </div>
                        </div>
                        <h6>Order Details</h6>
                        <div class="row">
                            <div class="col-xs-6">
                                <ul type="none">
                                    <li class="left">Order number:</li>
                                    <li class="left">Date:</li>
                                    <li class="left">Price:</li>
                                    <li class="left">Shipping:</li>
                                    <li class="left">Total Price:</li>
                                </ul>
                            </div>
                            <div class="col-xs-6">
                                <ul class="right" type="none">
                                    <li class="right">#BBRT-3456981</li>
                                    <li class="right">19-03-2020</li>
                                    <li class="right">$690</li>
                                    <li class="right">$30</li>
                                    <li class="right">$720</li>
                                </ul>
                            </div>
                        </div>
                        <h6>Shipment</h6>
                        <div class="row" style="border-bottom: none">
                            <div class="col-xs-6">
                                <ul type="none">
                                    <li class="left">Estimated arrival</li>
                                </ul>
                            </div>
                            <div class="col-xs-6">
                                <ul type="none">
                                    <li class="right">25-03-2020</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> <!-- Modal footer -->
                <div class="modal-footer"> <button type="button" class="btn">Track order</button> </div>
            </div>
        </div>
    </div>
</div>