jQuery(document).ready(function ($) {
                var _SlideshowTransitions = [
						{$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}
                        ];
                        var options = {

                            $ArrowNavigatorOptions: {    //[Optional] Options to specify and enable arrow navigator or not
                                $Class: $JssorArrowNavigator$, //[Requried] Class to create arrow navigator instance
                                $ChanceToShow: 1,  //[Required] 0 Never, 1 Mouse Over, 2 Always
                                $AutoCenter: 2  //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0

                            },

                            $AutoPlay: true,
                            $SlideshowOptions: {
                                    $Class: $JssorSlideshowRunner$,
                                    $Transitions: _SlideshowTransitions,
                                    $TransitionsOrder: 1,
                                    $ShowLink: true
                                    },


                             $ThumbnailNavigatorOptions: {
                                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                                    $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                                    $AutoCenter: 0,                                 //[Optional] Auto center thumbnail items in the thumbnail navigator container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 3
                                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange thumbnails, default value is 1
                                    $SpacingX: 3,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                                    $SpacingY: 3,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                                    $DisplayPieces: 9,                              //[Optional] Number of pieces to display, default value is 1
                                    $ParkingPosition: 260,                          //[Optional] The offset position to park thumbnail
                                    $Orientation: 1,                                //[Optional] Orientation to arrange thumbnails, 1 horizental, 2 vertical, default value is 1
                                    $DisableDrag: false                            //[Optional] Disable drag or not, default value is false
                                }

                        };
            var jssor_slider1 = new $JssorSlider$('slider', options);
            });