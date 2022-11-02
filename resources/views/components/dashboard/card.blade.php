<div class="card @yield('cardType')">
    <div class="card-header">
        <div class="card-header-content">
            <div>
                <h3 class="card-title">
                    <strong>
                        @yield('cardTitle')
                    </strong>
                </h3>
            </div>
            <div>
                @yield('cardAction')
            </div>
        </div>
    </div>
    <div class="card-body">
        @yield('cardBody')
    </div>

    <div class="card-footer">
        @yield('cardFooter')
    </div>
</div>
