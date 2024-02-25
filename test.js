const models = ["year", "building", "class", "course", "faculty", "lecturer", "room", "schedule", "student", "study"];
const permissions = ["create", "read", "update", "delete"];

console.log(models.map(v => {
    return permissions.map(vv => ({
        name: `${v}-${vv}`
    }))
}).map(v => v[0]))