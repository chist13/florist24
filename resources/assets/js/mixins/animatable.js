class Animation{
    static eventNames = ['webkitAnimationEnd', 'mozAnimationEnd', 'MSAnimationEnd', 'oanimationend', 'animationend']

    constructor(node, name) {
        this.node = node
        this.name = name

        this.func = function() {}
    }

    start() {
        this.node.classList.add('animated', this.name)

        Animation.eventNames.map(eventName => {
            let func = e => {
                this.handler(e)

                this.node.removeEventListener(eventName, func)
            }

            this.node.addEventListener(eventName, func)
        })
    }

    get paused() {
        return this.node.style['animation-play-state'] === 'paused'
    }

    get running() {
        return !this.paused
    }

    pause() {
        this.node.style['-webkit-animation-play-state'] = 'paused'
        this.node.style['animation-play-state'] = 'paused'
    }

    run() {
        this.node.style['-webkit-animation-play-state'] = 'running'
        this.node.style['animation-play-state'] = 'running'
    }

    stop() {
        this.node.style['-webkit-animation-play-state'] = ''
        this.node.style['animation-play-state'] = ''

        this.node.classList.remove('animated', this.name)

        Animation.eventNames.map(eventName => {
            this.node.addEventListener(eventName, func)
        })
    }

    handler(e) {
        this.node.classList.remove('animated', this.name)

        this.done = true
    }
}

export default {
    methods: {
        animate(node, name) {
            let animation = new Animation(node, name)

            animation.start()

            setTimeout(n => {
                animation.pause()
            }, 200)
            setTimeout(n => {
                animation.run()
            }, 400)

        }
    }
}