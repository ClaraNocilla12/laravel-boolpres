<template>
    

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item" v-if="pagination.currentPage >1" @click="$emit('on-page-change', pagination.currentPage - 1)"><span class="page-link" href="#" >Previous</span></li>
    <li  v-for="page in pagination.lastPage" :key="page" class="page-item" @click="$emit('on-page-change', page)"><span class="page-link" href="#"  role="button">{{page}}</span></li>
    
    <li class="page-item" v-if="pagination.lastPage > pagination.currentPage" @click="$emit('on-page-change', pagination.currentPage + 1)"><span class="page-link" href="#" >Next</span></li>
  </ul>
</nav>

</template>

<script>
export default {
    name: 'Pagination',
    props: [
        'pagination'
    ]
}
</script>