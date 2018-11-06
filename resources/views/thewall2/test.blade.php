@extends ('thewall2/layout')
@section ('title')
    Тестовая вьюха
@stop

@section('content')
    <div class="main-player-container">
        <app-player><div id="player">
                <div class="player-time-container">
		<span class="player-current-time">
			71:00
		</span>

                    <div class="player-song-progress">
                        <div class="player-buffered-progress">
                            <span></span>
                        </div>

                        <mat-slider class="player-song-slider mat-slider mat-accent mat-slider-horizontal mat-slider-min-value" role="slider" tabindex="0" aria-disabled="false" aria-valuemax="Infinity" aria-valuemin="0" aria-valuenow="4259" aria-orientation="horizontal" style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><div class="mat-slider-wrapper"><div class="mat-slider-track-wrapper"><div class="mat-slider-track-background" style="transform: translateX(7px) scaleX(1);"></div><div class="mat-slider-track-fill" style="transform: translateX(-7px) scaleX(0);"></div></div><div class="mat-slider-ticks-container" style="transform: translateX(0%);"><div class="mat-slider-ticks" style="background-size: 0% 2px; transform: translateZ(0px) translateX(0%); padding-left: 7px;"></div></div><div class="mat-slider-thumb-container" style="transform: translateX(-100%);"><div class="mat-slider-focus-ring"></div><div class="mat-slider-thumb"><div class="player-song-slider-label"><span>00:00</span></div></div><div class="mat-slider-thumb-label"><span class="mat-slider-thumb-label-text">4259</span></div></div></div></mat-slider>
                    </div>

                    <span class="player-track-duration">
			0:00
		</span>
                </div>

                <div class="player-controls-container">
                    <div class="player-controls-buttons">
                        <div class="player-shuffle-container">
                            <button class="player-shuffle" playershuffletoggle="" type="button">
                                <mat-icon class="mat-icon" role="img" svgicon="player-random" aria-hidden="true"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
<path style="fill:#FFFFFF;" d="M17,2v3h-2.8c-1.1,0-2.2,0.6-2.7,1.7l-4.9,9.8C6.5,16.8,6.1,17,5.8,17H2v2h3.8
	c1.1,0,2.2-0.6,2.7-1.7l4.9-9.8C13.5,7.2,13.9,7,14.2,7H17v3l5-4L17,2z M2,5v2h3.8c0.3,0,0.7,0.2,0.9,0.6l1.7,3.3l1.1-2.2l-1-2
	C7.9,5.6,6.9,5,5.8,5H2z M11.6,13.1l-1.1,2.2l1,2c0.5,1,1.5,1.7,2.7,1.7H17v3l5-4l-5-4v3h-2.8c-0.3,0-0.7-0.2-0.9-0.6L11.6,13.1z"></path>
</svg></mat-icon>
                            </button>
                        </div>

                        <div class="player-controls">
                            <button class="player-prev" playerprev="" type="button">
                                <mat-icon class="mat-icon" role="img" svgicon="player-previous" aria-hidden="true"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
<path style="fill:#FFFFFF;" d="M13.2,3.6L0,12l13.2,8.4v-6.8L24,20.4V3.6l-10.8,6.8V3.6z"></path>
</svg></mat-icon>
                            </button>

                            <button class="player-play-pause" playerplaypause="" type="button">
                                <!---->
                                <!----><mat-icon class="mat-icon ng-star-inserted" role="img" svgicon="player-pause" aria-hidden="true"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
<style type="text/css">
    .st0{fill:none;}
    .st1{fill:#FFFFFF;}
</style>
                                        <path class="st0" d="M0-1.9h24v24H0V-1.9z"></path>
                                        <path class="st1" d="M12,0C5.4,0,0,5.4,0,12s5.4,12,12,12s12-5.4,12-12S18.6,0,12,0z M10.8,16.8H8.4V7.2h2.4V16.8z M15.6,16.8h-2.4
	V7.2h2.4V16.8z"></path>
</svg></mat-icon>
                                <!---->
                            </button>

                            <button class="player-next" playernext="" type="button">
                                <mat-icon class="mat-icon" role="img" svgicon="player-next" aria-hidden="true"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
<g id="surface1">
    <path style="fill:#FFFFFF;" d="M10.8,20.4L24,12L10.8,3.6v6.8L0,3.6v16.8l10.8-6.8V20.4z"></path>
</g>
</svg></mat-icon>
                            </button>
                        </div>

                        <div class="player-repeat-container">
                            <button class="player-repeat" playerrepeattoggle="" type="button">
                                <mat-icon class="mat-icon" role="img" svgicon="player-repeat" aria-hidden="true"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">

<path style="fill:#FFFFFF;" d="M17,2v3H6C4.3,5,3,6.3,3,8v6.8l2-1.6V8c0-0.6,0.4-1,1-1h11v3l5-4L17,2z M21,9.2l-2,1.6V16
	c0,0.6-0.4,1-1,1H7v-3l-5,4l5,4v-3h11c1.7,0,3-1.3,3-3V9.2z"></path>

</svg></mat-icon>
                            </button>
                        </div>
                    </div>

                    <div class="player-info-container">
                        <span class="player-track-artist"></span>

                        <span class="player-track-name">Lounge</span>

                        <span class="player-track-playlist"></span>
                    </div>

                    <div class="player-buttons">
                        <button class="player-playlist" style="display:none" type="button">
                            <mat-icon class="mat-icon" role="img" svgicon="player-playlist" aria-hidden="true"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
<path style="fill:none;" d="M0,0h24v24H0V0z"></path>
                                    <path style="fill:#FFFFFF;" d="M15,6H3v2h12V6z M15,10H3v2h12V10z M3,16h8v-2H3V16z M17,6v8.2c-0.3-0.1-0.6-0.2-1-0.2
	c-1.7,0-3,1.3-3,3s1.3,3,3,3s3-1.3,3-3V8h3V6H17z"></path>
</svg></mat-icon>
                        </button>

                        <button class="player-like" style="display:none" type="button">
                            <mat-icon class="mat-icon" role="img" svgicon="player-like" aria-hidden="true"><svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
<path style="fill:none;" d="M0,0h24v24H0V0z"></path>
                                    <path style="fill:#FFFFFF;" d="M16.5,3c-1.7,0-3.4,0.8-4.5,2.1C10.9,3.8,9.2,3,7.5,3C4.4,3,2,5.4,2,8.5c0,3.8,3.4,6.9,8.6,11.5
	l1.4,1.3l1.4-1.3c5.2-4.7,8.6-7.8,8.6-11.5C22,5.4,19.6,3,16.5,3z M12.1,18.5L12,18.6l-0.1-0.1C7.1,14.2,4,11.4,4,8.5
	C4,6.5,5.5,5,7.5,5c1.5,0,3,1,3.6,2.4H13C13.5,6,15,5,16.5,5c2,0,3.5,1.5,3.5,3.5C20,11.4,16.9,14.2,12.1,18.5z"></path>
</svg></mat-icon>
                        </button>

                        <div class="player-mute-container">
                            <button class="player-mute" dropdownplacement="top" dropdowntrigger="hover" playermutetoggle="" type="button">
                                <mat-icon class="mat-icon" role="img" svgicon="player-volume" aria-hidden="true"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
<path style="fill:#FFFFFF;" d="M3,9v6h4l5,5V4L7,9H3z M16.5,12c0-1.8-1-3.3-2.5-4v8C15.5,15.3,16.5,13.8,16.5,12z M14,3.2v2.1
	c2.9,0.9,5,3.5,5,6.7s-2.1,5.9-5,6.7v2.1c4-0.9,7-4.5,7-8.8S18,4.1,14,3.2z"></path>
                                        <path style="fill:none;" d="M0,0h24v24H0V0z"></path>
</svg></mat-icon>
                            </button>
                        </div>

                        <!---->

                        <button class="player-button-" style="display:none" type="button">
                            <mat-icon class="mat-icon" role="img" svgicon="player-add" aria-hidden="true"><svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
<path style="fill:#FFFFFF;" d="M19,13h-6v6h-2v-6H5v-2h6V5h2v6h6V13z"></path>
                                    <path style="fill:none;" d="M0,0h24v24H0V0z"></path>
</svg></mat-icon>
                        </button>

                        <button class="player-button-collapse" type="button">
                            <mat-icon class="mat-icon" role="img" svgicon="player-hide" aria-hidden="true"><svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
<path style="fill:none;" d="M0,0h24v24H0V0z"></path>
                                    <path style="fill:#FFFFFF;" d="M12,2C6.5,2,2,6.5,2,12s4.5,10,10,10s10-4.5,10-10S17.5,2,12,2z M12,14l-4-4h8L12,14z"></path>
</svg></mat-icon>
                        </button>
                    </div>
                </div>
            </div>

            <!---->
        </app-player>
    </div>
@stop