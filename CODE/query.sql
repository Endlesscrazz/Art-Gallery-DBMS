select perm_decs from permissions, user_role, role_perm where user_role.user_id = 36 and user_role.role_id = role_perm.role_id and role_perm.perm_id = permissions.perm_id;