<nav class="navbar navbar-light navbar-expand-md" style="min-height: 100px;margin-bottom: 0px;border-bottom-width: 1px;border-bottom-style: solid;">
    <div class="container-fluid"><a class="navbar-brand" href="/." style="font-size: 25px;">EduDaily</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item search"><a class="nav-link text-uppercase" id="search" href="#" style="color: rgb(84,101,116);"><i class="fa fa-search" style="color: rgb(84, 101, 116);"></i></a></li>
                <li class="nav-item hide" id="search-box"><a class="nav-link" href="#"><input type="text" id="search-box-input" style="height: 20px;border-radius: 20px;border: 1px solid rgb(84,101,116) ;" onchange="search(event)"></a>
                    <div class="dropdown-menu" id="search-result" style="margin-left: 10px;">
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script type="text/javascript">
    function search(e) {
        let search = e.target.value;
        if (document.activeElement === e.target && "" != search) {
            fetch("/api/search", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({search}),
            })
            .then(response => response.json())
            .then(data => {
                let result = document.querySelector("#search-result")
                result.classList.add("show")
                data.forEach(post => {
                    result.innerHTML += `<a class='dropdown-item' href='/post/${post.slug}'>${post.title}</a>`;
                });
            })
            .catch((error) => {
                console.log('Error:', error);
            });
        } else {
            document.querySelector("#search-result").classList.remove("show")
        }
    }
</script>