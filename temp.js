// /**
//  * @param {number[]} nums
//  * @return {boolean}
//  */
// var containsDuplicate = function(nums) {
//     if (nums.length <2){
//         return false;
//     }
//     if (new Set(nums).size==nums.length){
//         return false
//     }
//     else{
//         return true;
//     }
// }

var containsDuplicate = function(nums) {
    if (nums.length <2){
        return false;
    }
    if (new Set(nums).size==nums.length){
        return false
    }
    else{
        return true;
    }
}