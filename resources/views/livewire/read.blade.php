<div class="px-2 pt-16 md:p-0 md:pt-16 md:max-w-3xl mx-auto">
    @foreach ($paragraphs as $key => $paragraph)
    @if ($loop->index == count($paragraphs) - 5)
        <div
            x-data="{
                observe () {
                    let observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                console.log('scroll!')
                                @this.call('scroll')
                            }
                        })
                    }, {
                        root: null
                    })
        
                    observer.observe(this.$el)
                }
            }"
            x-init="observe"
        ></div>
    @endif
        <pre class="mb-5 text-justify font-serif">{{ $paragraph }}</pre>
    @endforeach
</div>
