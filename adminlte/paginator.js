console.log('Paginator initialized')

class Paginator{
    constructor(obj){
        this.obj = obj
    }
    paginate(parPage){
        const perPage = parPage
        const obj = this.obj
        var pagination = []
        var start = 0
        var end = perPage
        var next = 0
        var current
        var previous
        var next 

        var last = obj.length / perPage

        for(let i = 0; i < last; i++){
            // console.log(obj.slice(start,end))
            let subArray = obj.slice(start,end)
            
            current = i + 1
            next = (i + 1) + 1
            previous = (i + 1) - 1
            start = start + perPage
            end = end + perPage

            // console.log('current = '+ current)
            // console.log('next = ' + next)
            // console.log('previous = ' + previous)

            let item = {
                data: subArray,
                page: {
                    current,
                    next,
                    previous,
                    last
                }
            }

            pagination.push(item)
            
        }

        return pagination
    }
}
