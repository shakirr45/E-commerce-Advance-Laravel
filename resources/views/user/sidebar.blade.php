<div class="card">
            <div class="card-header">Welcome , {{ Auth::user()->name }}</div>
            <div class="card-body">

            <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/Boracay_White_Beach.png/300px-Boracay_White_Beach.png">
            <ul class="list-group list-group-flush">
                <a href="{{ route('home') }}" class="text-muted"> <li class="list-group-item"><i class="fas fa-home"></i> Dashboard</li></a>
                <a href="{{ route('wishlist') }}" class="text-muted"> <li class="list-group-item"><i class="fas fa-heart"></i> Wishlist</li></a>
                <a href="" class="text-muted"> <li class="list-group-item"><i class="fas fa-file-alt"></i> My Order</li></a>

                <a href="{{ route('customer.setting') }}" class="text-muted"> <li class="list-group-item"><i class="fas fa-edit"></i> Setting</li></a>
                <a href="" class="text-muted"> <li class="list-group-item"><i class="fab fa-telegram-plane"></i> Open Ticket</li></a>
                <a href="{{ route('customer.logout') }}" class="text-muted"> <li class="list-group-item"><i class="fas fa-sign-out-alt"></i> Logout</li></a>

            </ul>
            </div>
        </div>