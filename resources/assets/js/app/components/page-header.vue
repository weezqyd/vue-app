<template>
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">{{ title }}</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">{{navPage}}</li>
                        <li v-if="page" class="breadcrumb-item active" aria-current="page">{{page}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['title', 'page', 'navPage'],
}
</script>

