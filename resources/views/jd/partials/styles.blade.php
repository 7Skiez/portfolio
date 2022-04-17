<style>
    @if(!isset($splitMatches))
        @if ($jd)
            .bg-color {
                background-color: {{ setting('jd_bg_color') }}
            }
        @elseif($ivno) 
            .bg-color {
                background: radial-gradient(rgba(0, 0, 0, 0.9) 2px, {{ setting('ivno.bg_color') }} 10%);
                background-size: 28px 28px;
            }

            .bg-gradient {
                background-image: {{ setting('ivno.main_gradient') }}
            }

            .bg-accent {
                background-color: {{ setting('ivno.accent_bg_color') }}
            }

            .text-accent {
                color: {{ setting('ivno.accent_text_color') }}
            }

            .bg-glow {
                background-image: {{ setting('ivno.footer_bg_glow') }}
            }

            text {
                background: {{ setting('ivno.accent_bg_color') }};
                fill: {{ setting('ivno.accent_text_color') }};
                border-radius: 1.2rem;
                padding: 0.577rem 0.825rem
            }
        @endif
    @else
        .left>div, .right>div {
            margin: 1rem 0 1rem 0;
        }

        @foreach($splitMatches[0] as $key => $match)

            .left>div:nth-child({{ $key + 1 }}) {
                transform: rotate({{ $degree1 }}deg);
                transform-origin: right;
            }

            <?php $degree1 -= $reduceBy($splitMatches[0]) ?>

        @endforeach

        @foreach($splitMatches[1] as $key => $match)

            .right>div:nth-child({{ $key + 1 }}) {
                transform: rotate({{ $degree2 * -1 }}deg);
                transform-origin: left;
            }
            <?php $degree2 -= $reduceBy($splitMatches[1]) ?>
            
        @endforeach

        .left>div:hover,
        .right>div:hover {
            transform: rotate(0)
        }
    @endif
</style>
