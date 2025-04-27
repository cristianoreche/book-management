@if ($message)
    <div class="alert alert--{{ $type }} {{ $dismissible ? 'alert--dismissible' : '' }}" id="alert-message">
        <div class="alert__content">
            {{ $message }}
        </div>

        @if ($dismissible)
            <button type="button" class="alert__close" onclick="this.parentElement.style.display='none';">
                &times;
            </button>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alert = document.getElementById('alert-message');
            if (alert) {
                setTimeout(() => {
                    alert.style.opacity = '0';
                    setTimeout(() => {
                        alert.remove();
                    }, 500);
                }, 4000);
            }
        });
    </script>
@endif
